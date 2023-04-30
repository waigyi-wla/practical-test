<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Events\NewSurvey;

class SurveyController extends Controller
{
    public function index()
    {   
        $surveys = Survey::all();
        return view('welcome', compact('surveys'));
    }

    public function survey_form(string $id)
    {
        try {

            $survey = Survey::with(['questions.options.form_setting'])->findOrFail($id);
            return view('survey_form', compact('survey'));

        } catch (ModelNotFoundException $e) {
            // Handle the exception
            dd('Error');
        }
    }

    public function submit_answer(Request $request)
    {

        //send email
        NewSurvey::dispatch();

        return redirect()->back()->with("status", "Successfully Answered.");
    }
}
