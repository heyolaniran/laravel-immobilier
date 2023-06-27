<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login () { 
       
        return view('auth.login') ; 
    }

    public function doLogin(AuthRequest $request) { 

        $credentials = $request->validated() ; 

        if(Auth::attempt($credentials)) { 
            $request->session()->regenerate() ; 

            return redirect()->intended(route('admin.properties.index')) ; 

        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects'
        ])->onlyInput('email') ; 
    }

    public function logout() 
    { 
        Auth::logout();

        return to_route('login')->with('success' , 'vous êtes maintenant déconnecté') ; 
    }
}
