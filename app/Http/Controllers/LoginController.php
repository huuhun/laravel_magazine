<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    // public function index(Request $req)
    // {
    //     return view('view');
    // }

     public function save(Request $req)
    {
        $arr =[
            "email" => 'required|email',
            "password" => 'required',
        ];
//
        $validate = $req->validate($arr);


       if ( Auth::attempt($validate,$req->input('remember')))
       {
            //ok
            $req->session()->regenerate();
            return redirect()->intended('admin');//admin là default thoy
       }

        return back()->withErrors([
            'email'=>'Wrong email or password',
        ]);//return with errors
    }
}
