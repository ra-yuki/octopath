<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Octopath;
use App\MetaDataset;
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
        $octopath_datasets = Octopath::all();

        return view('octopaths.index', [
            'octopath_datasets' => $octopath_datasets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $octopath_dataset = new Octopath();
        
        return view('octopaths.create', [
            'octopath_dataset' => $octopath_dataset,   
            'merge_num' => OctopathConfig::MERGE_NUM,
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
        /*
        // isset() returns false only when the assigned value is:
        // - NULL,
        // - variable declared but without value, or
        // - totally not declared
        */
        
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
        $meta_datasets->enabled = true;
        $meta_datasets->retention_date = $_POST['retention_date'];
        $meta_datasets->save();
        
        return redirect('/');
        
        //return for redirecting to result page
        //return redirect('/result?octopath=1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($octopath)
    {
        //get metadata of octopath
        $meta_data = MetaDataset::where('octopath', '=', $octopath)->get();
        //print_r($meta_data);
        
        //get link data inside octopath url
        $octopath_datasets = Octopath::where('octopath', '=', $octopath)
            ->orderBy('display_order', 'asc')
            ->get();
        //print_r($octopath_datasets);
        
        //get full octopath url
        $octopath_url = Octopath::get_octopath_url($octopath_datasets[0]->octopath);
        
        //view
        return view('octopaths.show', [
            'meta_data' => $meta_data,
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
        $meta_dataset = MetaDataset::where('octopath', '=', $octopath)->get();
        
        return view('octopaths.edit', [
            'octopath_datasets' => $octopath_datasets,
            'meta_dataset' => $meta_dataset[0],
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
        $octopath_tables = Octopath::where('octopath', '=', $octopath)->get();
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
        $meta_dataset->enabled = true;
        $meta_dataset->retention_date = $_POST['retention_date'];
        $meta_dataset->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_dashboard(){
        $octopath_datasets = Octopath::all();
        
        return view('octopaths.dashboard',[
            'octopath_datasets' => $octopath_datasets,
        ]);
    }
}
