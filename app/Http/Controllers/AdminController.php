<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function registerView(){
        return view('register');
    }

    public function register(Request $request){
        $val = Validator::make($request->all(),[
            'username' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required',
        ]);

        if($val->fails()){
            return response()->json([
               'status' => 404,
               'response' => $val->errors()->first()
            ]);
        }

        $data = Admin::create([
           'username' => $request->username,
           'email' => $request->email,
           'password' => Hash::make($request->password),
        ]);

        if($data){
            return response()->json([
                'status' => 200,
                'response' => "Succesfully Registered"
            ]);
        }
        else {
            return response()->json([
                'status' => 500,
                'response' => "Registation Failed"
            ]);
        }
    }

    public function loginView(){
        return view('login');
    }

    public function login(Request $request){

        $val = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($val->fails()){
            return response()->json([
                'status' => 404,
                'response' => $val->errors()->first()
            ]);
        }

        $data = Admin::where('email', $request->email)->first();

        if(empty($data)){
            return response()->json([
                'status' => 404,
                'response' => "Email Not Found. Please Register First"
            ]);
        }

        $auth = Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

       if($auth){
           return response()->json([
               'status' => 200,
               'response' => "Successfully Logged In"
           ]);
       }
       else {
           return response()->json([
               'status' => 400,
               'response' => "Email Or Password is Wrong"
           ]);
       }



    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
