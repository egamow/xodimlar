<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Position;
use App\Structure;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index($id)
    {
        $department = Structure::findOrFail($id);
        return view('position.index', [
            'positions' => Structure::where('pid', $id)->where('type', 'p')->get(),
            'department' => $department,
        ]);
    }


    public function create($id)
    {
        $department = Structure::findOrFail($id);
        return view('position.create', [
            'department' => $department,
        ]);
    }

    public function store(Request $request)
    {
//        $id = $request->input('pid');
        $data = $request->all();
        $structure = Structure::create($data);
        return redirect()->route('structure.index', ['department_id' => $structure->pid])
            ->with('success', 'Муваффақиятли қўшилди.');
    }

    public function show($position_id)
    {
        //
    }

    public function edit($id)
    {
        $position = Structure::findOrFail($id);
        return view('position.edit', [
            'position' => $position,
        ]);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $position = Structure::find($id);
        $position->update($data);
        return redirect()->route('structure.index', ['department_id' => $position->pid])
            ->with('success', 'Муваффақиятли тахрирланди.');
    }

    public function destroy($position_id)
    {
        $data = Structure::where('id', $position_id)->first();
        $route = $data->pid;
        if ($data) {
            $data->delete();
            return redirect()->route('position.index', $route);
//                ->with('success', 'Муваффақиятли ўчирилди');
        } else {
            return redirect()->route('position.index', $route)
                ->with('error', 'Учирилиб бўлмади');
        }
    }
}
