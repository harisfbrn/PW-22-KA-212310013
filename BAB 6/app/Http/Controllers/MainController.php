<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function soal2()
    {
        $data = array();
        $data['title'] = "Blade Directive";
        $data['npm'] = 212310004;
        $skill[] = array("course"=>"Matematika", "type"=>"Diskrit", "rate"=>4);
        $skill[] = array("course"=>"Matematika", "type"=>"Aljabar Linear", "rate"=>3);
        $skill[] = array("course"=>"Basis Data", "type"=>"DDL", "rate"=>2);
        $skill[] = array("course"=>"B inggris", "type"=>"Speaker", "rate"=>1);
        $data['skill'] = $skill;
        return view('lat2') ->with("data", $data);
    }
}
