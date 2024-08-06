<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 442);
        }

        // $complaint = Complaint::create($request->all());
        $complaint = Complaint::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return response()->json([
            'message' => 'Complaint form submitted successfully',
            'data' => $complaint
        ], 201);
    }
}
