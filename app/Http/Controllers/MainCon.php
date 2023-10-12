<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginData;
class MainCon extends Controller
{
     //login form
     public function datacheck(Request $data){ 
        session()->start();
        $email = $data['email'];
        $password = $data['password'];
        $data->session()->put('status', 'ture');
        $data->session()->put('email', $email);
        $data->session()->put('password', $password);

        $user= LoginData::Where(["Email" => $email , "Password"=>$password])->First();
        if($user){
            return redirect("admin")->with("success", "Login-Success");
        }else{
            return view('LogOut')->with("msg","email or password wrong");
        }
    }

    // index page
    public function index(){
        return view('LogOut');
    }

    //admin page
    public function admin(Request $data){
        session()->start();
        if(session()->has("status")) {
            return view('admin');
        }else{
            return view('LogOut');
        }
    }

        
    //sub category
    // public function sub(){
    //     session()->start();
    //     if(session()->has("status")) {
    //         return view('SubCat');
    //     }else{
    //         return view('LogOut');
    //     }
    // }

    //product
    public function pro(){
        session()->start();
        if(session()->has("status")) {
            return view('product');
        }else{
            return view('LogOut');
        }
    }

    //change password
    public function change(Request $data){
        session()->start();
        if(session()->has("status")){
            return view('ChangePassword');
        }else{
            return view('LogOut');
        }
        
    }
    public function changed(Request $data){
        
        $data->validate(
            [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]
        );

        $current_passswrod = $data['old_pass'];
        $new_passswrod = $data['password'];
        $con_passswrod = $data['password_confirmation'];
        $log = session("email");

        // echo $current_passswrod;
        // echo $new_passswrod;
        // echo $con_passswrod;
        // echo $log;
        $loggeduser = LoginData::where(["Email"=>$log, "Password"=>$current_passswrod])->first();


        if($current_passswrod == $loggeduser["Password"] && $log == $loggeduser["Email"]){
            if($new_passswrod == $con_passswrod){
                $loggeduser["Password"] = $new_passswrod;
                $loggeduser->save();
                $data->session()->put('password', $new_passswrod);
                return redirect("/admin")->with("success", "password updated");
            } 
        }
        // $change = LoginData::find($data->old_pass);
        // $change->Password = $data->password;
       
        // print_r($change->Password);
        // $change->save();
        // session()->start();
        // session()->put('password', $data['password']);
        // return redirect("ChangePassword");
        
    }


    //logout
    public function out(){
        session()->forget("Email");
        session()->forget("Password");
        session()->flush();
        return view('LogOut');
    }

}
