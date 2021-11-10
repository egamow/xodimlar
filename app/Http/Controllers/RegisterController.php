<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.main'));
        }

        $validateFields = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        if(User::where('login', $validateFields['login'])->exists()){
           return redirect(route('user.register'))->withErrors([
                'login' => 'Киритилган логин банд ...'
        ]);
        }


        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.main'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'Руйхатдан утишда хатолик!'
        ]);
    }
}
