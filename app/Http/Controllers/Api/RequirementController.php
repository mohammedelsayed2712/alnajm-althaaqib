<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequirementCard;
use App\Models\RequirementItem;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public function index(){
        $requiremetItem = RequirementItem::first();
        $requiremetCard = RequirementCard::all();

        return response()->json([
            'requiremetItem' => $requiremetItem,
            'requiremetCard' => $requiremetCard
        ]);
    }
}
