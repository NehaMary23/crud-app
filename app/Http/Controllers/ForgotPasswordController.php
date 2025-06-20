<?php

namespace App\Http\Controllers;

use App\Models\ForgotPassword;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    function forgotPassword()
    {
        return view('forgotPassword');
    }

    function forgotPasswordPost(Request $request)
    {
         $request->validate([
            'email' => 'required|email|exists:logins,email',    
            'password' => 'required|confirmed',        
        ]);

        $user = Login::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            
            return redirect(route('login'))->with('success','Password changed successfully');
        }        
        return redirect(route('forgot'))->with('error','Invalid Email');
    }
}
