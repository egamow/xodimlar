<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

//    public function show($id){
//        return view('profile.edit', ['user'=>User::findOrFail($id)]);
//    }


//    public function index(){
//
//        $user = User::where('login','egamow')->first();
//
//        return view('profile', ['login'=>$user]);
//
//
//
//    }

    public function edit(User $user)
    {
        return view('profile.edit', ['user'=>auth()->user()]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=>$request->new_password]);

        return view('profile.edit', ['user'=>auth()->user()]);

    }


//    public function save($user_id)
//    {
//
//        $user = User::find($user_id);
//        $user->update($password);
//        return $user;
//    }



}
