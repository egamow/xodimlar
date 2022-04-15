<?php

namespace App\Http\Controllers;

use App\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function index(Request $request)
    {
        $department_id = $request->get('department_id');
        $department = Structure::where('id', $department_id)->first();
        $positions = $department ? Structure::where('type', 'p')->where('pid', $department->id)->get() : [];
        return view('structure.index', [
            'items' => Structure::where('type', 'd')->withCount('countPositions')->get(),
            'department' => $department ?? null,
            'positions' => $positions,
        ]);
    }

    public function create(Request $request)
    {
        $department_id = $request->get('department_id') ?? null;
        $departments = Structure::where('type', 'd')->get();
        return view('structure.create', [
            'departments' => $departments,
            'department_id' => $department_id,
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
        $positions = Structure::where('pid', $id)->get();
        if ($data) {
            $positions->each(function ($item) {
                $item->delete();
            });
            $data->delete();
            return redirect()->route('structure.index')
                ->with('success', 'Муваффақиятли ўчирилди');
        } else {
            return redirect()->route('structure.index')
                ->with('error', 'Учирилиб бўлмади');
        }
    }
}
