<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleCard;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index() {
        $saleItem = Sale::first();
        $cards = SaleCard::all();

        return response()->json([
            'saleItem' => $saleItem,
            'cards' => $cards
        ]);
    }
}
