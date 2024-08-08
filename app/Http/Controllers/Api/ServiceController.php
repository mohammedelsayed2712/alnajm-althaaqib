<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCard;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $serviceItem = ServiceItem::first();
        $cards = ServiceCard::all();

        return response()->json([
            'serviceItem' => $serviceItem,
            'cards' => $cards,
        ]);
    }
}
