<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index(){
        $recruitments = Recruitment::with([
            'country', 'job', 'religion', 'status', 'experience'
        ])->get();        

        $response = $recruitments->map(function ($recruitment) {
            return [
                'country' => $recruitment->country->name,
                'job' => $recruitment->job->title,
                'religion' => $recruitment->religion->name,
                'status' => $recruitment->status->name,
                'experience' => $recruitment->experience->level,
                'price' => $recruitment->price,
                'cv_url' => $recruitment->cv_url,
                'buttons' => [
                    'reserve_cv' => url("/reserve-cv/{$recruitment->id}"),
                    'download_cv' => $recruitment->cv_url,
                ],
            
            ];
        });

        return response()->json($response);
    }
}
