<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table( 'users')->where('is_staff', true)->orderByDesc('created_at')->paginate(10);
        return view('employees.index', ['employees'=> $employees]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function edit(User $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
        ]);

        User::create([
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'birthdate'=>$request->birthdate,
            'phone'=>$request->phone,
            'password' => $request->login.'-'.$request->login,
        ]);

        return redirect()->route('employees.index')
            ->with('success','Янги ходим муваффақиятли қўшилди.');
    }

    public function show(User $employee)
    {
        return view('employees.show',compact('employee'));
    }

    public function update(Request $request, User $employee)
    {
        $request->validate([
            'login' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',

        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success','Муваффақиятли таҳрирланди');
    }

    public function destroy(User $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success','Ходим маълумотлари ўчирилди');
    }

}
