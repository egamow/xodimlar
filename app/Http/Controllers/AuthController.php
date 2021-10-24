<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->tabel_number = $request['tabel_number'];
        $user->password = bcrypt($request->password);
        $user->save();
    }

    public function login(Request $request)
    {
        $request->validate([
            'tabel_number' => 'required',
            'password' => 'required'
        ]);

        $data = request(['tabel_number', 'password']);
        if (!Auth()->attempt($data)) {
            return response('Tabel nomer yoki parol xato', 422);
        }
        $user = User::where('tabel_number', $request->input('tabel_number'))->first();

        $authToken = $user->createToken('auth-token')->plainTextToken;

        return view('index', compact($authToken));
    }
}
