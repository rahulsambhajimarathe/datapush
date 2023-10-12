<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function category(){
        
        session()->start();
        if(session()->has("status")) {
        $all_cat = Category::all()->toArray();
        return view("CatAdd", ["all_category" => $all_cat]);
        }else{
        return view("LogOut");

        }
    }

    function add_category(Request $req){
        $catName = $req["cat_name"];
        $catStatus = $req["cat_status"];

        if($catStatus == "on"){
            $catStatus = 1;
        }else{
            $catStatus = 0;
        }

        $cat = new Category();
        $cat->cat_name = $catName;
        $cat->cat_status = $catStatus;

        
        $cat->save();

        return redirect(route("name_Category"))->with("data", "Category Added");
        // return $cat->all();
    }
    public function del_category(Request $req, $cat_id=null){
        $one = Category::find($cat_id)->delete();
        return redirect(route("name_Category"));
    }
    function edit_category(Request $req, $cat_id=null){
        $cat_single_data = Category::find($cat_id);
        if($cat_single_data){
            $cat_single_data = Category::find($cat_id);
            return redirect()->route("name_Category", ["cat_name"=>$cat_single_data["cat_name"], "cat_id"=>$cat_single_data["id"], "action"=>"edit_cat"]);
        }else{
            return redirect(route(("name_Category")));
        }
        // if($cat_id!=null && $cat_single_data){
        //     $cat_single_data = Category::find($cat_id);
        //     return view("add-category", ["cat_single_data"=>$cat_single_data]);
        // }else{
        //     return redirect(route(("name_Category")));
        // }
    }
    function update_category(Request $req, $cat_id=null){
        $cat_single_data = Category::find($cat_id);
        $cat_single_data->cat_name = $req['cat_name'];
        $cat_single_data->cat_name = $req['cat_status'];

        $cat_single_data->save();
        // if($cat_single_data){
        //     $cat_single_data = Category::find($cat_id);
        //     return redirect()->route("name_Category", ["cat_name"=>$cat_single_data["cat_name"], "cat_id"=>$cat_single_data["id"], "action"=>"edit_cat"]);
        // }else{
        //     return redirect(route(("name_Category")));
        // }
        // // if($cat_id!=null && $cat_single_data){
        //     $cat_single_data = Category::find($cat_id);
        //     return view("add-category", ["cat_single_data"=>$cat_single_data]);
        // }else{
            // }
                return redirect(route(("name_Category")));
        }

}
