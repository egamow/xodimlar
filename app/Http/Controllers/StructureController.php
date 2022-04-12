<?php

namespace App\Http\Controllers;

use App\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function index()
    {
        return view('structure.index', ['items' => Structure::all()]);
    }

    public function create()
    {
        $departments = Structure::where('type', 'd')->get();
        return view('structure.create', [
            'departments' => $departments,
        ]);
    }

    public function edit(Structure $structure)
    {
        return view('structure.edit', [
            'structure' => $structure,
            'departments' => Structure::where('type', 'd')->get(),
        ]);
    }

    public function store(Request $request)
    {
        if ($request->type == 'p') {
            $request->validate([
                'name' => 'required',
                'pid' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'pid' => 'nullable']);
        }
        $data = $request->all();
        Structure::create($data);

        return redirect()->route('structure.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show($id)
    {
        return Structure::find($id);
    }


    public function update($id, Request $request)
    {
        $data = $request->all();
        $id = Structure::find($id);
        $id->update($data);
        return redirect()->route('structure.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy($id)
    {
        $data = Structure::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return redirect()->route('structure.index')
                ->with('success', 'Муваффақиятли ўчирилди');
        } else {
            return redirect()->route('structure.index')
                ->with('error', 'Учирилиб бўлмади');
        }
    }
}
