<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApplyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'experience' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx'
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $filePath = $request->file('file')->store('uploads');


        $job = ApplyJob::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'experience' => $request->experience,
            'file' => $filePath,
        ]);

        return response()->json([
                'message' => 'Offer submitted successfully',
                 'data' => $job,
            ], 201);
    }
}
