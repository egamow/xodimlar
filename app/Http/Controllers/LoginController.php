<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validateFields = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

//        $validateFields=$request->only(['login', 'password']);

        if(Auth::check()){
            return redirect()->intended(route('user.main'));
        }


        if(Auth::attempt($validateFields)){
            return redirect()->intended(route('user.main'));
        }
        return redirect(route('user.login'))->withErrors([
           'login'=>'Логин ёки парол нотугри !'
        ]);
    }

}
