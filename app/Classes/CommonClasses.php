<?php

namespace App\Classes;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommonClasses
{
    public static function projectName($projectID){
        return  (DB::table('projects')->where('id','=',"$projectID")->first())->project_name;
    }
}
