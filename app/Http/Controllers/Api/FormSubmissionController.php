<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    public function submitForm(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'msg' => 'required|string',
        ]);

        $formSubmission = FormSubmission::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'msg' => $request->msg,
        ]);

        return response()->json(['message' => 'Form submitted successfully', 'data' => $formSubmission], 201);
    }
}
