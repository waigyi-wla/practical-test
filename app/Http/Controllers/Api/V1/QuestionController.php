<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return $this->sendResponse($questions, 'Questions fetched.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            
            $input = $request->all();
            $validator = Validator::make($input, [
                'survey_id' => 'required|int|exists:App\Models\User,id',
                'title' => 'required',
                'question_type' => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }

            $question = Question::create($input);
            return $this->sendResponse($question, 'Survey created.');

        } catch (Exception $e) {

            return $this->sendError(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
