<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index (Request $request){
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'service_type' => 'required|string|in:New recruitment, Immediate receipt, Request inquiries',
        ]);

        // $offer = Offer::create($request->all());
        $offer = Offer::create([
            'name' => $request->name,
            'city' => $request->city,
            'phone' => $request->phone,
            'service_type' => $request->service_type,
        ]);

        
        return response()->json([
            'message' => 'Offer submitted successfully',
            'data' => $offer,
        ], 201);
    }
}
