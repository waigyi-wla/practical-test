<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Options;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OptionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
            $input = $request->all();
            $validator = Validator::make($input, [
                'question_id' => 'required|int|exists:App\Models\Question,id',
                'form_setting_id' => 'required|int|exists:App\Models\FormSetting,id',
                'title' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }

            $question = Options::create($input);
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
