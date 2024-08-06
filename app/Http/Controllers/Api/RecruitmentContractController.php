<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Begin;
use App\Models\Contract;
use App\Models\Operation;
use Illuminate\Http\Request;

class RecruitmentContractController extends Controller
{
    public function index() {
        $recruitmentContract = Contract::first();

        return response()->json($recruitmentContract);
    }

    public function begin() {
        $recruitmentBegins = Begin::first();

        return response()->json($recruitmentBegins);
    }

    public function operation() {
        $recruitmentOperations = Operation::all();

        return response()->json($recruitmentOperations);
    }
}
