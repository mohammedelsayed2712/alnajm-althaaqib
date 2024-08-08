<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use App\Models\Card;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
       $aboutItem = AboutItem::first();
       $cards = Card::all();

       return response()->json([
        'aboutItem' => $aboutItem,
        'cards' => $cards,
       ]);
    }
}
