<?php

namespace App\Http\Controllers;

use App\Id;
use Illuminate\Http\Request;

class IdController extends Controller
{
    public function index()
    {
        return view('ids.index', ['ids' => Id::orderBy('id')->get()]);
    }

    public function create()
    {
        return view('ids.create');
    }

    public function edit(Id $id)
    {
        return view('ids.edit', compact('id'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Id::create($data);

        return redirect()->route('ids.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show($id)
    {
        return Id::find($id);
    }


    public function update($id, Request $request)
    {
        $data = $request->all();
        $id = Id::find($id);
        $id->update($data);
        return redirect()->route('ids.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy(Id $id)
    {
        $id->delete();

        return redirect()->route('ids.index')
            ->with('success', 'Муваффақиятли ўчирилди');
    }
}
