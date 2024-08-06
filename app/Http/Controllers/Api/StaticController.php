<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StaticCard;
use App\Models\StaticItem;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index() {
        $staticItems = StaticItem::first();
        $cards = StaticCard::all();

        return response()->json([
            'staticItems' => $staticItems,
            'cards' => $cards
        ]);
    }
}
