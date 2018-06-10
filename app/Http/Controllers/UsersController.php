<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Octopath;
use App\MetaDataset;
use App\Folder;

class UsersController extends Controller
{
    public function config(){


        return view('users.config');
    }

    public function show_dashboard(){
        $meta_datasets = MetaDataset::all();
        $octopath_datasets = Octopath::all();
        
        return view('users.dashboard',[
            'octopath_datasets' => $octopath_datasets,
            'meta_datasets' => $meta_datasets,
        ]);
    }
}
