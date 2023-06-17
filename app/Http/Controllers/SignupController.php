<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class SignupController extends Controller
{
    // public function index(Request $req)
    // {
    //     return view('view');
    // }

     public function save(Request $req)
    {   
        $arr =[
            "name" => 'required|alpha',//no special word
            // "email" => 'required|email|unique:users,username',//unique kiểm tra table nào trong đó cái email ko trùng
            "email" => 'required|email|unique:users',//unique kiểm tra table nào trong đó cái email ko trùng
            "password" => 'required',

        ];

        $validated = $req->validate($arr);
//
        // $user->insert($validated);
        $user = new User();
     
        $hasher = new Hash();
        $date = date("Y-m-d H-i-s");
        $user->insert([
            'name' => $req->input('name'),//<-'name' of the inpit
            'email' => $req->input('email'),
            'password' =>Hash::make($req->input('password')) ,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        
        return redirect('login'); //redirect represent url nên ko cần auth.login khác với view(auth.login)
    }
}
