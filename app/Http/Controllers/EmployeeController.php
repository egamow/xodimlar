<?php

namespace App\Http\Controllers;

use App\Structure;
use App\User;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $departments = Structure::where('type', 'd')->get();
        $positions = Structure::where('type', 'p')->get();
        $employees = User::where('is_staff', true)
            ->with('department', 'position')
            ->orderByDesc('created_at');
        $search = $request->input('search');
        if (isset($search)) {
            $employees = $employees->where('login', 'like', '%' . $search . '%')
                ->orWhere('firstname', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%')
                ->orWhere('middlename', 'like', '%' . $search . '%');
        }

        $employees = $employees->paginate(10);
        return view('employees.index', [
            'departments' => $departments,
            'positions' => $positions,
            'employees' => $employees,
            'search' => $search,
        ]);
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
        User::create([
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'department_id' => $request->department_id ?? null,
            'position_id' => $request->position_id ?: null,
            'middlename' => $request->middlename ?? null,
            'birthdate' => $request->birthdate ?? null,
            'phone' => $request->phone ?? null,
            'password' => bcrypt($request->login . '-' . $request->login),
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Янги ходим муваффақиятли қўшилди.');
    }

    public function show(User $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function update(Request $request, $employee)
    {
//        $request->validate([
//            'login' => 'required',
//            'firstname' => 'required',
//            'lastname' => 'required',
//            'birthdate' => 'required',
//
//        ]);

        $employee = User::find($employee);
        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Муваффақиятли таҳрирланди');
    }

    public function destroy(User $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Ходим маълумотлари ўчирилди');
    }

}
