<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\serviceModel;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('adminpanel');
    }

    function services()
    {
        return view('/content/services');
    }
    function dataService()
    {
        $result = json_encode(serviceModel::all());
        return $result;
    }
    function addCourse(){
        return view('/content/addCourse');
    }
    function save(Request $request){
       $result =  $request->file('picKey')->store('public/image/services');
        $filePath = 'Hello/world';
        $name = $request->nameKey;
        $des = $request->desKey;
        serviceModel::insert(['service_image'=>$filePath,'service_name'=>$name,'service_des'=>$des]);
        return $result;
    }
    function delete(Request $request){
        $id = $request->input('id');
        $result = serviceModel::where('id','=',$id)->delete();
       if($result == true){
        return 1;
       }
       else{
         return 0;
       }
    }

}
