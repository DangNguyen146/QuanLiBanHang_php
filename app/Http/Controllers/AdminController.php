<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin(){
        if(Auth::check()){
            return redirect('home');
        }
        // dd(bcrypt('1234'));//1234
        return view('login');

    }
    public function postloginAdmin(Request $request){

        $remember = $request->has('remember_me') ? true :false;
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ],$remember)) {
            return redirect()->to('home');
        }
    }
}
