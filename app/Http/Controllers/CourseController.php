<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\Test;
use App\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'login', 'firstname', 'lastname')->where('trainer', true)->orderBy('id')->get();

        return view('course.index', [
            'courses' => Course::withCount('users')->orderBy('id')->get(),
            'tests' => Test::orderBy('id')->get(),
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

    public function start($course, Request $request)
    {
        $course = Course::find($course);

        if (!$course->test_id || $course->withCount('users')->count() < 1) {
            return redirect()->route('course.index')
                ->with('error', 'Курсни бошлаш учун тестни танланг ва ходимларни кўшинг.');
        }

        $course->begin_date = $request->begin_date;
        $course->save();
        $users = $course->users->pluck('id')->toArray();
        $course->test->users()->attach($users, ['date_deadline' => $course->begin_date]);
        return redirect()->route('course.index');

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

    public function group($course)
    {
        $users = User::select('id', 'login', 'firstname', 'lastname')->orderBy('id')->get();
        $course = Course::find($course);
        $groups = $course->users()->orderBy('id')->get();

        return view('course.group', [
            'course' => $course,
            'groups' => $groups,
            'users' => $users,
        ]);
    }

    public function users($course, Request $request)
    {
        $course = Course::find($course);
        $data = $request->all();
        $course->users()->attach([$data['user_id']]);

        return redirect()->route('courses.group', $course->id)
            ->with('success', 'Муваффақиятли қўшилди.');
    }

    public function group_delete($group)
    {
        $group = Group::find($group);
        $course = $group->course_id;
        $group->delete();

        return redirect()->route('courses.group', $course)
            ->with('success', 'Муваффақиятли ўчирилди.');
    }

    public function test($course)
    {
        $course = Course::find($course);
        $tests = Test::where('course_id', $course->id)->orderBy('id')->get();

        return view('course.test', [
            'course' => $course,
            'tests' => $tests
        ]);
    }

}
