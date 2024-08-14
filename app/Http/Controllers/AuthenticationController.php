<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    
public function register()
{
    if (Auth::check()){
        return redirect()->route('dashbord');
    }
    

    return view('registration');

}

public function login(){
  
        if (Auth::check()){

            return redirect()->route('dashbord');
        }
        return view ('login');
    
}


public function logout(){
    Auth::logout();
    return redirect('/');   
}
}
