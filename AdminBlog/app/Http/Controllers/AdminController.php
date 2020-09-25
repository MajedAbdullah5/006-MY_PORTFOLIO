<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\serviceModel;
use Illuminate\Support\Facades\DB;

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

    function addCourse()
    {
        return view('/content/addCourse');
    }

    function save(Request $request)
    {
        $result = $request->file('picKey')->store('public/image/services');
        $filePath = 'Hello/world';
        $name = $request->nameKey;
        $des = $request->desKey;
        serviceModel::insert(['service_image' => $filePath, 'service_name' => $name, 'service_des' => $des]);
        return $result;
    }

    function delete(Request $request)
    {
        $id = $request->input('id');
        $result = serviceModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    // edit/{2}
    function editService(Request $request)
    {
        $id = $request->input('id');
        $result = serviceModel::where('id', '=', $id)->get();
        return $result;
    }

    function updateService(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $des = $request->input('des');
        $img = $request->input('img');

        $result = DB::table('services')->where('id', '=', $id)->update(['service_name' => $name, 'service_des' => $des, 'service_image' => $img]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
function addNew(Request  $request){
       $name = $request->input('name');
        $des = $request->input('des');
        $img =  $request->input('img');
        $result = serviceModel::insert(['service_name'=>$name,'service_des'=>$des,'service_image'=>$img]);
        if($result == true){
            return 1;
        }
        else{
            return 0;
        }
}

}
