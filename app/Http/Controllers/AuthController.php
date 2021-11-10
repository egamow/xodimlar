<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
//    public function register(Request $request)
//    {
//        $user = new User();
//        $user->login = $request['login'];
//        $user->password = bcrypt($request->password);
//        $user->save();
//    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $data = request(['login', 'password']);
        if (!Auth()->attempt($data)) {
            return response('Логин ёки парол нотугри', 422);
        }
        $user = User::where('login', $request->input('login'))->first();

        $authToken = $user->createToken('auth-token')->plainTextToken;

        return view('index', compact($authToken));
    }
}
