<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitorsModel;

class visitorController extends Controller
{
    function home(){
       $visitor_data =  json_decode(visitorsModel::all());
        return view('visitor',["key"=>$visitor_data]);
    }
}
