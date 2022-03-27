<?php

namespace App\Http\Controllers;

use App\Td;
use Illuminate\Http\Request;

class TdController extends Controller
{
    public function index()
    {
        return view('tds.index', ['tds' => Td::all()]);
    }

    public function create()
    {
        return view('tds.create');
    }

    public function edit(Td $td)
    {
        return view('tds.edit', compact('td'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Td::create($data);

        return redirect()->route('tds.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show($id)
    {
        return Td::find($id);
    }


    public function update($id, Request $request)
    {
        $data = $request->all();
        $td = Td::find($id);
        $td->update($data);
        return redirect()->route('tds.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy(Td $td)
    {
        $td->delete();

        return redirect()->route('tds.index')
            ->with('success', 'Муваффақиятли ўчирилди');
    }
}
