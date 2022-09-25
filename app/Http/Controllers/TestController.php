<?php

namespace App\Http\Controllers;

use App\Course;
use App\Test;
use App\Question;
use App\UserTest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('test.index', compact('tests'));
    }

    public function question($test)
    {
        $test = Test::find($test);
        $questions = Question::where('test_id', $test->id)->orderBy('id')->get();

        return view('test.question', [
            'test' => $test,
            'questions' => $questions,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $test = new Test();
        $test->name = $data['name'];
        $test->minutes = $data['minutes'];
        $test->description = $data['description'];
        $test->created_by = auth()->user()->id;
        $test->save();

        return redirect()->route('test.index');
    }

    public function show($test)
    {
        return Test::find($test);
    }

    public function update(Request $request, $test)
    {
        $data = $request->all();
        $test = Test::find($test);
        $test->name = $data['name'];
        $test->minutes = $data['minutes'];
        $test->description = $data['description'];
        $test->save();

        return redirect()->route('test.index');
    }

    public function start($test)
    {
        $test = Test::find($test);
        $course = Course::where('id', $test->course_id)->first();
        $users = $course->users->pluck('id')->toArray();
        $test->update(['begin_date' => now()]);
        $test->users()->attach($users, ['date_deadline' => $test->begin_date]);
        return redirect()->route('courses.test', $test->course_id);

    }

    public function destroy($test)
    {
        $test = Test::find($test);
        $test->delete();

        return redirect()->route('test.index');
    }

}
