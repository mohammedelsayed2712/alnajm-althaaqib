<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CvPhoto;
use Illuminate\Http\Request;

class CvPhotoController extends Controller
{
    public function index(){
        $photos = CvPhoto::paginate(1);

        return response()->json($photos);
    }
}
