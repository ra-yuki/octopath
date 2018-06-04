<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Libraries\OctopathHelper;

class Octopath extends Model
{
    public static function get_octopath_url($octopath){
        return OctopathHelper::create_octopath_url($octopath);
    }
}
