<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

use App\Octopath;
use App\MetaDataset;
use App\Folder;

class UsersController extends Controller
{
    public function config(){
        $user = Auth::user();

        return view('users.config', [
            'user' => $user,
        ]);
    }

    public function show_dashboard(){
        //should do this with SQL? (group by?)
        $user_id = Auth::user()->id;
        $meta_datasets = MetaDataset::where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->get();
        /*$octopath_datasets = new Collection(); //init as Eloquent\Collection inst
        foreach($meta_datasets as $meta_dataset){ //merge all the links matched with octopath in metadatas
            $octopath_datasets = $octopath_datasets->merge( Octopath::where('octopath', '=', $meta_dataset->octopath)->get() );
        }*/
        
        return view('users.dashboard',[
            /*'octopath_datasets' => $octopath_datasets,*/
            'meta_datasets' => $meta_datasets,
        ]);
    }
}
