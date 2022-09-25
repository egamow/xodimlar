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
        $search = $request->get('search') ?? null;
        $departments = Structure::where('type', 'd')->orderBy('id');
        if (isset($search)) {
            $departments = Structure::where('type', 'd')->where('name', 'like', '%' . $search . '%');
        }
        $positions = $department ? Structure::where('type', 'p')->where('pid', $department->id)->orderBy('id')->get() : [];
        return view('structure.index', [
            'items' => $departments->withCount('countPositions')->orderBy('id')->get(),
            'department' => $department ?? null,
            'departments' => $departments->get(),
            'positions' => $positions,
        ]);
    }

    public function create(Request $request)
    {
        $department_id = $request->get('department_id') ?? null;
        $departments = Structure::where('type', 'd')->orderBy('id')->get();
        return view('structure.create', [
            'departments' => $departments,
            'department_id' => $department_id,
        ]);
    }

    public function edit(Structure $structure)
    {
        return view('structure.edit', [
            'structure' => $structure,
            'departments' => Structure::where('type', 'd')->orderBy('id')->get(),
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
        $model = Structure::create($data);
        $data['type'] == 'p' ? $department = Structure::where('id', $data['pid'])->first() : $department = Structure::find($model->id)->first();

        $positions = $department ? Structure::where('type', 'p')->where('pid', $department->id)->orderBy('id')->get() : [];
        return view('structure.index', [
            'items' => Structure::where('type', 'd')->withCount('countPositions')->orderBy('id')->get(),
            'department' => $department,
            'departments' => Structure::where('type', 'd')->orderBy('id')->get(),
            'positions' => $positions,
        ]);

//        return redirect()->route('structure.index')
//            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show($id)
    {
        return Structure::find($id);
    }


    public function update($id, Request $request)
    {
        $data = $request->all();
        $model = Structure::find($id);

        $model->update($data);
        $data['type'] == 'p' ? $department = Structure::where('id', $data['pid'])->first() : $department = $model;
        $positions = $department ? Structure::where('type', 'p')->where('pid', $department->id)->orderBy('id')->get() : [];
        $departments = Structure::where('type', 'd')->orderBy('id')->get();

        return view('structure.index', [
            'items' => Structure::where('type', 'd')->withCount('countPositions')->orderBy('id')->get(),
            'department' => $department ?? null,
            'departments' => $departments,
            'positions' => $positions,
        ]);
//        return redirect()->route('structure.index')
//            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy($id)
    {
        $data = Structure::where('id', $id)->first();
        $positions = Structure::where('pid', $id)->orderBy('id')->get();
        if ($data) {
            $positions->each(function ($item) {
                $item->delete();
            });
            $data->delete();
            return redirect()->route('structure.index');
//                ->with('success', 'Муваффақиятли ўчирилди');
        } else {
            return redirect()->route('structure.index');
//                ->with('error', 'Учирилиб бўлмади');
        }
    }
}
