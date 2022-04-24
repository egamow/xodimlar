<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'login', 'firstname', 'lastname')->orderBy('id')->get();

        return view('course.index', [
            'courses' => Course::orderBy('id')->get(),
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
        Course::create($data);

        return redirect()->route('course.index')
            ->with('success', 'Муваффақиятли қўшилди.');
    }


    public function show(Course $course)
    {
        return $course;
    }


    public function update(Course $course, Request $request)
    {
        $data = $request->all();
        $course->update($data);
        return redirect()->route('course.index')
            ->with('success', 'Муваффақиятли тахрирланди.');
    }


    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')
            ->with('success', 'Муваффақиятли ўчирилди');
    }
}
