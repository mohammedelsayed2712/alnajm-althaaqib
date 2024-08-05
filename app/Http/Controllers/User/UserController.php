<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }

    public function login(){
        return view('user.login');
    } 

    public function login_submit(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        $check = $request->all();
        $data = [
            'email'=> $check['email'],
            'password'=> $check['password'],
        ];

        if(auth()->attempt($data)){
            return redirect()->route('admin_dashboard');
        } else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin_login')->with('success', 'Logout successfully!');
    }

}
