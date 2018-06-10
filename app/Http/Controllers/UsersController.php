<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $meta_datasets = MetaDataset::all();
        $octopath_datasets = Octopath::all();
        
        return view('users.dashboard',[
            'octopath_datasets' => $octopath_datasets,
            'meta_datasets' => $meta_datasets,
        ]);
    }
}
