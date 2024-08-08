<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RecruitmentService;
use App\Models\RecruitmentServiceCard;
use Illuminate\Http\Request;

class RecruitmentServiceController extends Controller
{
    public function index() {
        $services = RecruitmentService::first();

        return response()->json($services);
    }

    public function recruitmentservicecard(){
        $cards = RecruitmentServiceCard::all();

        // return response()->json($cards);
        return response()->json([
            'cards' => $cards->map(function($card){
                return [
                    'id' => $card->id,
                    'title' => $card->title,
                    'image' => $card->image
                ];
            }),
        ]);
    }
}
