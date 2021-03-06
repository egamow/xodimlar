<?php

namespace App\Http\Controllers;

use App\Id;
use App\IdViolation;
use App\User;
use Illuminate\Http\Request;

class IdViolationController extends Controller
{

    public function index()
    {
        $ids = Id::orderBy('id')->get();
        $users = User::select('id', 'login', 'firstname', 'lastname')->orderBy('id')->get();
        $id_violations = IdViolation::select()->with('ids')->with('user')->orderBy('id')->get();

        return view('id_violation.index', [
            'id_violations' => $id_violations,
            'ids' => $ids,
            'users' => $users,
        ]);
    }

    public function create()
    {
        $ids = Id::all();
        $users = User::all();
        return view('id_violation.create', [
            'ids' => $ids,
            'users' => $users,
        ]);
    }

    public function edit(IdViolation $idViolation)
    {
        $ids = Id::all();
        $users = User::all();
        return view('id_violation.edit', [
            'idViolation' => $idViolation,
            'ids' => $ids,
            'users' => $users,
        ]);
    }

    public function store(Request $violationRequest)
    {
        $data = $violationRequest->all();
        $data['author_id'] = auth()->id();
        $data['created_at'] = $violationRequest['created_at'] ?? now();
        IdViolation::create($data);

        return redirect()->route('id_violation.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show($id_violation_id)
    {
        return IdViolation::find($id_violation_id);
    }


    public function update($id_violation, Request $violationRequest)
    {
        $data = $violationRequest->all();
        $id_violation = IdViolation::find($id_violation);
        $id_violation->update($data);
        return redirect()->route('id_violation.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy(IdViolation $idViolation)
    {
        $idViolation->delete();

        return redirect()->route('id_violation.index')
            ->with('success', 'Муваффақиятли ўчирилди');
    }
}
