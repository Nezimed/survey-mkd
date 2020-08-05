<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Project;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function create($uuid)
    {
        if (!Str::isUuid($uuid))
        {
            return abort(404);
        }

        $project = Project::where('uuid', $uuid)->firstOrFail();

        $questions = Question::orderBy('id', 'asc')->get();

        return view('survey', compact('project', 'uuid', 'questions'));
    }

    public function store(Request $request, $uuid)
    {
        $this->validate($request, [
           'name' => 'required',
           'role' => 'required',
           'question' => 'required|array'
        ]);

        $project = Project::findByUuid($uuid);

        $employee = $project->employees()->create(
            [
                'name' => $request->name,
                'role' => $request->role
            ]
        );

        foreach ($request->question as $id => $value)
        {
            $employee->inputs()->create([
                'question_id' => $id,
                'answer' => $value
            ]);
        }

        return redirect()->back()->with('status-success', 'Formulário submetido com sucesso');
    }
}
