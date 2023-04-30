<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\FormSetting;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FormSettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form_settings = FormSetting::all();
        return $this->sendResponse($form_settings, 'Form Settings fetched.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            
            $input = $request->all();
            $validator = Validator::make($input, [
                'name' => 'required',
                'type' => 'required'
            ]);
            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }
            $form_setting = FormSetting::create($input);
            return $this->sendResponse($form_setting, 'Form setting created.');

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

            $form_setting = FormSetting::findOrFail($id);
            return $this->sendResponse($form_setting, 'Form Setting fetched.');

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
