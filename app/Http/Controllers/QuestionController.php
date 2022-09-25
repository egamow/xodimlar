<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data[$data['check']] = true;
        $test_id = $data['test_id'];
        unset($data['check']);
        Question::create($data);
        return redirect()->route('tests.question', $test_id);
    }

    public function show($question)
    {
        return Question::find($question);
    }

    public function update(Request $request, $question)
    {
        $data = $request->all();
        $question = Question::find($question);
        $data['check1'] = $data['check2'] = $data['check3'] =
        $data['check4'] = $data['check5'] = false;
        $data[$data['check']] = true;
        unset($data['check']);

        $question->update($data);

        return redirect()->route('tests.question', $question->test_id);
    }

}
