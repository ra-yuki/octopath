<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Libraries\OctopathHelper;

class Octopath extends Model
{
    protected $table = 'octopath_datasets';

    public static function get_octopath_url($octopath){
        return OctopathHelper::create_octopath_url($octopath);
    }
    
    public static function delete_by_octopaths($octopaths){
        $results = [];
        for($i=0; $i<count($octopaths); $i++){
            $results[$octopaths[$i]] = Octopath::where('octopath', '=', $octopaths[$i])->delete();
        }
        
        return $results;
    }
}
