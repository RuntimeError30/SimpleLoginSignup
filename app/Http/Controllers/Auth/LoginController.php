<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function Dashboard(Request $request){
        $incomingFields = $request->validate([
            "email"=> "required",
            "password"=> "required",
        ]);
        if(auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])){
            $request->session()->regenerate();
        }
        return redirect('/');
    }
    public function Login()
    {
        return view('login');
    }
}
