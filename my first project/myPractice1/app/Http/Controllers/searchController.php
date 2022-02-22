<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class searchController extends Controller
{
    function index(){
        return "index";
    }
    function getData(Request $req){
        
        $cites = City::all();
        $result = City::where('name' , $req->city)->first();
        if($result != null )
            echo "vojod darad" ;
            // return redirect()->back()->with('success' , 'vojod dard');
        else
            return redirect()->back()->withErrors($result);
            // return redirect()->back()->with('success' , 'vojod nadard');
        
    }
   
    
}
