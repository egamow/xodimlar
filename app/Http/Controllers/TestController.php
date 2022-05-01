<?php

namespace App\Http\Controllers;

use App\Course;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($course)
    {
        $course = Course::find($course);
        $tests = Test::where('course_id', $course)->orderBy('id')->get();

        return view('course.test', [
            'course' => $course,
            'tests' => $tests
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $test = new Test();
        $test->course_id = $data['course_id'];
        $test->name = $data['name'];
        $test->minutes = $data['minutes'];
        $test->description = $data['description'];
        $test->created_by = auth()->user()->id;
        $test->save();

        return redirect()->route('courses.test', $data['course_id']);
    }

    public function show($test)
    {
        $test = Test::find($test);

        return $test;
    }

    public function update(Request $request, $test)
    {
        $data = $request->all();
        $test = Test::find($test);
        $test->name = $data['name'];
        $test->minutes = $data['minutes'];
        $test->description = $data['description'];
        $test->save();

        return redirect()->route('courses.test', $test->course_id);
    }

    public function destroy($test)
    {
        $test = Test::find($test);
        $test->delete();

        return redirect()->route('courses.test', $test->course_id);
    }

}
