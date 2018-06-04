<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Octopath;
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
        $octopaths = Octopath::all();

        return view('octopaths.index', [
            'octopaths' => $octopaths,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $octopath = new Octopath();
        
        return view('octopaths.create', [
            'octopath' => $octopath,   
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
        $octopaths = Octopath::where('octopath', '=', $octopath)
            ->orderBy('display_order', 'asc')
            ->get();
        $octopath_url = Octopath::get_octopath_url($octopaths[0]->octopath);
        
        return view('octopaths.show', [
            'octopaths' => $octopaths,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $octopaths = Octopath::all();
        
        return view('octopaths.dashboard',[
            'octopaths' => $octopaths,
        ]);
    }
}
