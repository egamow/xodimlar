<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table( 'users')->where('is_staff', true)->orderByDesc('created_at')->paginate(10);
        return view('admin.index', ['users'=> $users]);
    }

    public function show(User $user)
    {
        return view('admin.show',compact('admin'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'login' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',

        ]);

        $user->update($request->all());

        return redirect()->route('admin.index')
            ->with('success','Парол бекор килинди');
    }

    public function reset($user_id)
    {
        $login=User::find($user_id)->login;
        $new_password= $login.'-'.$login;
        User::find($user_id)->update(['password'=>$new_password]);
        return redirect()->route('admin.index')
            ->with('success','Парол бекор килинди');
    }

    public function role_update(Request $request, $user_id)
    {
       dd($request->get('curator'));

        $admin=$request->get('admin');
        $trainer=$request->get('trainer');
        $inspector=$request->get('inspector');
        $personnel_officer=$request->get('personnel_officer');
        $curator=$request->get('curator');


        User::find($user_id)->update(
            ['admin'=>$admin,
            'trainer'=>$trainer,
            'inspector'=>$inspector,
            'personnel_officer'=>$personnel_officer,
            'curator'=>$curator]
            );
        return redirect()->route('admin.index')
            ->with('success','Рол узгартирилди');
    }


}
