<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CountryCard;
use App\Models\CountryItem;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index() {
        $countryItems = CountryItem::first();
        $cards = CountryCard::all();

        return response()->json([
            'countryItems' => $countryItems,
            'cards' => $cards
        ]);
    }
}
