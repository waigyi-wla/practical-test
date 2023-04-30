<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Survey;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveys = Survey::all();
        return $this->sendResponse($surveys, 'Surveys fetched.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
            $input = $request->all();
            $validator = Validator::make($input, [
                'title' => 'required',
                'description' => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }

            $input['user_id'] = Auth()->user()->id;
            $survey = Survey::create($input);
            return $this->sendResponse($survey, 'Survey created.');

        } catch (Exception $e) {

            return $this->sendError(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $survey = Survey::with(['questions.options.form_setting'])->findOrFail($id);
            return $this->sendResponse($survey, 'Survey fetched.');

        } catch (ModelNotFoundException $e) {
            // Handle the exception
            return $this->sendError(['message' => 'Form Setting not found'], 404);
        }
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
