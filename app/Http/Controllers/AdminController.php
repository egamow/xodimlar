<?php

namespace App\Http\Controllers;

use App\Structure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $departments = Structure::where('type', 'd')->get();
        $positions = Structure::where('type', 'p')->get();
        $users = User::where('is_staff', true)->orderByDesc('created_at');
        $search = $request->input('search');

        if (isset($search)) {
            $users = $users->where('login', 'like', '%' . $search . '%')
                ->orWhere('firstname', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%')
                ->orWhere('middlename', 'like', '%' . $search . '%');
        }
        $users = $users->paginate(10);
        return view('admin.index', compact('departments', 'positions', 'users'));
//        return view('admin.index', ['users'=> $users]);
    }

    public function show($user)
    {
        return User::find($user);
    }

    public function edit(User $user)
    {
        $departments = Structure::where('type', 'd')->get();
        $positions = Structure::where('type', 'p')->get();
        return view('employees.edit', [
            'user' => $user,
            'departments' => $departments,
            'positions' => $positions
        ]);
    }

    public function store(Request $request)
    {

        User::store($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'Муваффақиятли кушилди');
    }

    public function update(Request $request, $id)
    {
//        $request->validate([
//            'login' => 'required',
//            'firstname' => 'required',
//            'lastname' => 'required',
//            'birthdate' => 'required',
//
//        ]);
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'Муваффақиятли таҳрирлаланди');
    }

    public function reset($user_id)
    {
        $login = User::find($user_id)->login;
        $new_password = $login . '-' . $login;
        User::find($user_id)->update(['password' => $new_password]);
        return redirect()->route('admin.index')
            ->with('success', 'Парол бекор килинди');
    }

    public function role_update(Request $request, $user_id)
    {


        $admin = false;
        $trainer = false;
        $inspector = false;
        $personnel_officer = false;
        $curator = false;

        if (!empty($request->admin))
            $admin = true;
        if (!empty($request->trainer))
            $trainer = true;
        if (!empty($request->inspector))
            $inspector = true;
        if (!empty($request->personnel_officer))
            $personnel_officer = true;
        if (!empty($request->curator))
            $curator = true;


        User::where('id', $user_id)->update(
            ['admin' => $admin,
                'trainer' => $trainer,
                'inspector' => $inspector,
                'personnel_officer' => $personnel_officer,
                'curator' => $curator]
        );

        return redirect()->route('admin.index')
            ->with('success', 'Рол узгартирилди');
    }


}
