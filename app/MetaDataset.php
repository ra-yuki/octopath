<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaDataset extends Model
{
    protected $table = 'octopath_meta_datasets';
    
    //return octopaths (array(string))
    public static function get_expired_octopaths(){
        $result = MetaDataset::select('octopath')->where( 'retention_date', '<', date_create( explode('T', date('c'))[0] ) )->get();
        
        $octopaths = [];
        for($i=0; $i<count($result); $i++){
            $octopaths[$i] = $result[$i]->octopath;
        }
        
        return $octopaths;
    }
    
    public static function delete_by_octopaths($octopaths){
        $results = [];
        for($i=0; $i<count($octopaths); $i++){
            $results[$octopaths[$i]] = MetaDataset::where('octopath', '=', $octopaths[$i])->delete();
        }
        
        return $results;
    }
}
