<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    
    function login()
    {
    return view('login');
    }

    function registration()
    {
    return view('registration');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',          //validation process 
            'password' => 'required|min:6',
        ]);

        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route('posts.index'));  
        }
        return redirect(route('login'))->with('error','Login Details are Invalid');
    }

     
    public function registrationPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
            
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = Login::create($data);

        if (!$user) {
            return redirect(route('registration'))->with('error', 'Try Again');
        }

        return redirect(route('login'))->with('success', 'Registration Successful');
    }


    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
