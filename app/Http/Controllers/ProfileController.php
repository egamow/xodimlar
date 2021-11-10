<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(){

        $user = User::where('login','egamow')->first();

        return view('profile', ['login'=>$user]);

    }

    public function save(Request $request)
    {

       $validateFields=$request->only(['login', 'password']);

        if(Auth::attempt($validateFields)){
            return redirect()->intended(route('user.main'));
        }
        return redirect(route('user.login'))->withErrors([
            'login'=>'Логин ёки парол нотугри !'
        ]);
    }
}
