<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Sub;

class SubController extends Controller
{
    //    //sub category
    function list_sub_category(){
        
        session()->start();
        if(session()->has("status")) {
            Category::all()->toArray();
            $one = Category::with("sub_category_rel")->get();
            return view("SubCat", ["all_category" => $one]);
        }else{
            return view('LogOut');
        }
        
    }

    public function add_sub_category(Request $req){
        $mainCat = Category::find($req->category_id);
        // return $mainCat;
        $catStatus = $req["sub_cat_status"];

        if($catStatus == "on"){
            $catStatus = 1;
        }else{
            $catStatus = 0;
        }

        $subCat = new Sub();
        $subCat->sub_cat_name = $req->sub_cat;
        $subCat->sub_cat_status = $catStatus;
        $subCat->category_id = $req->category_id;
        $mainCat->subCatRelToMain()->save($subCat);

        return redirect('SubCat')->with("data", "Sub Category Added");
    }

}
