<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmploymentArrival;
use App\Models\EmploymentService;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function arrival() {
        $employmentArrival = EmploymentArrival::first();

        return response()->json($employmentArrival);
    }
    public function service() {
        $employmentService = EmploymentService::first();

        return response()->json($employmentService);
    }
}
