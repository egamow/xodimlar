<?php

namespace App\Http\Controllers;

use App\Tb;
use App\TbViolation;
use App\User;
use Illuminate\Http\Request;

class TbViolationController extends Controller
{

    public function index()
    {
        $tbs = Tb::orderBy('id')->get();
        $users = User::select('id', 'login', 'firstname', 'lastname')->orderBy('id')->get();
        $tb_violations = TbViolation::select()->with('tbs')->with('user')->orderBy('id')->get();

        return view('tb_violation.index', [
            'tb_violations' => $tb_violations,
            'tbs' => $tbs,
            'users' => $users,
        ]);
    }

    public function create()
    {
        $tbs = Tb::all();
        $users = User::all();
        return view('tb_violation.create', [
            'tbs' => $tbs,
            'users' => $users,
        ]);
    }

    public function edit(TbViolation $tbViolation)
    {
        $tbs = Tb::all();
        $users = User::all();
        return view('tb_violation.edit', [
            'tbViolation' => $tbViolation,
            'tbs' => $tbs,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['author_id'] = auth()->id();
        $data['created_at'] = $violationRequest['created_at'] ?? now();
        TbViolation::create($data);

        return redirect()->route('tb_violation.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show(TbViolation $tbViolation)
    {
        return $tbViolation;
    }


    public function update($tb_violation, Request $request)
    {
        $data = $request->all();
        $tb_violation = TbViolation::find($tb_violation);
        $tb_violation->update($data);
        return redirect()->route('tb_violation.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy(TbViolation $tbViolation)
    {
        $tbViolation->delete();

        return redirect()->route('tb_violation.index')
            ->with('success', 'Муваффақиятли ўчирилди');
    }
}
