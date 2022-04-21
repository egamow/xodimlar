<?php

namespace App\Http\Controllers;

use App\Tb;
use Illuminate\Http\Request;

class TbController extends Controller
{
    public function index()
    {
        return view('tbs.index', ['tbs' => Tb::orderBy('id')->get()]);
    }

    public function create()
    {
        return view('tbs.create');
    }

    public function edit(Tb $tb)
    {
        return view('tbs.edit', compact('tb'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Tb::create($data);

        return redirect()->route('tbs.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show($id)
    {
        return Tb::find($id);
    }


    public function update($id, Request $request)
    {
        $data = $request->all();
        $id = Tb::find($id);
        $id->update($data);
        return redirect()->route('tbs.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy(Tb $tb)
    {
        $tb->delete();

        return redirect()->route('tbs.index')
            ->with('success', 'Муваффақиятли ўчирилди');
    }
}
