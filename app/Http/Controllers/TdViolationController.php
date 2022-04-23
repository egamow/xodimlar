<?php

namespace App\Http\Controllers;

use App\Td;
use App\TdViolation;
use App\User;
use Illuminate\Http\Request;

class TdViolationController extends Controller
{
    public function index()
    {
        $tds = Td::orderBy('id')->get();
        $users = User::select('id', 'login', 'firstname', 'lastname')->orderBy('id')->get();
        $td_violations = TdViolation::select()->with('tds')->with('user')->orderBy('id')->get();

        return view('td_violation.index', [
            'td_violations' => $td_violations,
            'tds' => $tds,
            'users' => $users,
        ]);
    }

    public function create()
    {
        $tds = Td::all();
        $users = User::all();
        return view('td_violation.create', [
            'tds' => $tds,
            'users' => $users,
        ]);
    }

    public function edit(TdViolation $tdViolation)
    {
        $tds = Td::all();
        $users = User::all();
        return view('td_violation.edit', [
            'tdViolation' => $tdViolation,
            'tds' => $tds,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['author_id'] = auth()->id();
        $data['created_at'] = $violationRequest['created_at'] ?? now();
        TdViolation::create($data);

        return redirect()->route('td_violation.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show(TdViolation $tdViolation)
    {
        return  $tdViolation;
    }


    public function update($td_violation, Request $request)
    {
        $data = $request->all();
        $td_violation = TdViolation::find($td_violation);
        $td_violation->update($data);
        return redirect()->route('td_violation.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy(TdViolation $tdViolation)
    {
        $tdViolation->delete();

        return redirect()->route('td_violation.index')
            ->with('success', 'Муваффақиятли ўчирилди');
    }
}
