<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Log;

use App\Octopath;
use App\MetaDataset;
use App\Folder;
use App\Libraries\OctopathConfig;
use App\Libraries\OctopathHelper;

class OctopathsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $octopath_dataset = new Octopath();
        
        $default_retention_date = OctopathHelper::get_date_year_added(OctopathHelper::get_today());

        return view('octopaths.index', [
            'octopath_dataset' => $octopath_dataset,
            'merge_num' => OctopathConfig::MERGE_NUM,
            'default_retention_date' => $default_retention_date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //*-- model --*//
        $octopath_dataset = new Octopath();
        
        //get the date 1 year later from today
        $default_retention_date = OctopathHelper::get_date_year_added(OctopathHelper::get_today());
        
        //get merge_num
        $merge_num = (isset($_GET['merge_num']) && ($_GET['merge_num'] > 0)) ? OctopathHelper::get_limited_value($_GET['merge_num'], OctopathConfig::MAX_MERGE_NUM) : OctopathConfig::MERGE_NUM;
        
        //*-- view --*//
        return view('octopaths.create', [
            'octopath_dataset' => $octopath_dataset,   
            'merge_num' => $merge_num,
            'default_retention_date' => $default_retention_date,
            'merge_num_plus_one' => ($merge_num+1),
            'merge_num_minus_one' => ($merge_num-1),
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Exception Handling
        for($i=0; $i<$request->merge_num; $i++){
            /* //REGEX DOES NOT WORK:(
            $validator = Validator::make($request->all(), [
                'link'.($i+1) => "regex:/^((https|http):\/\/)(.*)\.([a-z]{2,3})(.*)$/i",
            ]);
            
            if($validator->fails()){
                return redirect('octopaths.create')
                    ->withErrors($validator);
            }
            */
            
            //detecting no http/https associated links
            if(!preg_match("/^((https|http):\/\/)(.*)\.([a-z]{2,3})(.*)$/i", $_POST['link'. ($i+1)], $output_array)){
                //echo $_POST['link'. ($i+1)]. " is bullshit link<br>";
                return redirect('/create');
            }
        }
        
        //Store requested data to octopaths table
        //octopaths table
        $octopath = OctopathHelper::generate_octopath();
        //iterate as many times as merge_num corresponds
        for($i=0; $i<$request->merge_num; $i++){
            //instantiate model
            $octopath_table = new Octopath();
            
            //assign values
            $octopath_table->link = $_POST['link'. ($i+1)];
            $octopath_table->title = $_POST['title'. ($i+1)];
            $octopath_table->description = $_POST['description'. ($i+1)];
            $octopath_table->octopath = $octopath;
            $octopath_table->display_order = $i;
            
            //save to octopaths table
            $octopath_table->save();
        }
        
        //meta_datasets
        $meta_datasets = new MetaDataset();
        $meta_datasets->octopath = $octopath;
        $meta_datasets->title = $_POST['octopath_title'];
        $meta_datasets->retention_date = $_POST['retention_date'];
        //if authenticated, parse user id to meta datasets
        if(Auth::check()){
            $user_id = Auth::user()->id;

            //link user id with octopath
            $meta_datasets->user_id = $user_id;
        }
        $meta_datasets->save();
        
        return redirect('/'. $octopath. '/result');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($octopath)
    {
        //*-- model --*//
        //get metadata of octopath
        $meta_data = MetaDataset::where('octopath', '=', $octopath)->get();

        //get link data inside octopath url
        $octopath_datasets = Octopath::where('octopath', '=', $octopath)
            ->orderBy('display_order', 'asc')
            ->get();

        //get full octopath url
        $octopath_url = Octopath::get_octopath_url($octopath_datasets[0]->octopath);
        
        //*-- view --*//
        return view('octopaths.show', [
            'meta_data' => $meta_data[0],
            'octopath_datasets' => $octopath_datasets,
            'octopath_url' => $octopath_url,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($octopath)
    {
        $octopath_datasets = Octopath::where('octopath', '=', $octopath)->get();
        $meta_dataset = MetaDataset::where('octopath', '=', $octopath)->get()[0];
        
        //redirect to login if the octopath is user_id specified, and the user operating is NOT matched with the id
        $condition = ($meta_dataset->user_id != null) && ( !Auth::check() || ($meta_dataset->user_id != Auth::user()->id) );
        if($condition){
            return view('generals.not_authorized');
        }

        return view('octopaths.edit', [
            'octopath_datasets' => $octopath_datasets,
            'meta_dataset' => $meta_dataset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $octopath)
    {
        //Exception Handling
        for($i=0; $i<$request->merge_num; $i++){
            //detecting no http/https associated links
            if(!preg_match("/^((https|http):\/\/)(.*)\.([a-z]{2,3})(.*)$/i", $_POST['link'. ($i+1)], $output_array)){
                return redirect('/'. $octopath.'/edit');
            }
        }
        
        //Update requested data to octopaths table
        //octopaths table
        $octopath_tables = Octopath::where('octopath', '=', $octopath)->orderBy('display_order')->get();
        for($i=0; $i<count($octopath_tables); $i++){
            //assign values
            $octopath_tables[$i]->link = $_POST['link'. ($i+1)];
            $octopath_tables[$i]->title = $_POST['title'. ($i+1)];
            $octopath_tables[$i]->description = $_POST['description'. ($i+1)];
            $octopath_tables[$i]->octopath = $octopath;

            //save to octopaths table
            $octopath_tables[$i]->save();
        }
        //here
        //meta_datasets
        $meta_dataset = MetaDataset::where('octopath', '=', $octopath)->get()[0];
        $meta_dataset->octopath = $octopath;
        $meta_dataset->title = $_POST['octopath_title'];
        $meta_dataset->retention_date = $_POST['retention_date'];
        $meta_dataset->save();
        
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($octopath)
    {
        Octopath::delete_by_octopaths(array($octopath));
        MetaDataset::delete_by_octopaths(array($octopath));

        return redirect()->back();
    }
    
    public function result($octopath){
        $octopath_url = OctopathHelper::create_octopath_url($octopath);
        
        return view('octopaths.result',[
            'octopath_url' => $octopath_url,
        ]);
    }
}
