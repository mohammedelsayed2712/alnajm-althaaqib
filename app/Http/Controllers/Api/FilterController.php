<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Experience;
use App\Models\Item;
use App\Models\Job;
use App\Models\Status;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function getFilters() {

        return response()->json([
            'countries' => Country::all(['id', 'name']),
            'jobs' => Job::all(['id', 'title']),
            'experiences' => Experience::all(['id', 'level']),
            'statuses' => Status::all(['id', 'name']),
        ]);
    }

    public function filterItems(Request $request) {
        $query = Item::query();

        if($request->has('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if($request->has('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        if($request->has('experience_id')) {
            $query->where('experience_id', $request->experience_id);
        }

        if($request->has('status_id')) {
            $query->where('status_id', $request->status_id);
        }

        $items = $query->get()->map(function($item){
            return [
                'id' => $item->id,
                'name' => $item->name,
                'country' => $item->country->name,
                'job' => $item->job->title,
                'experience' => $item->experience->level,
                'status' => $item->status->name,
            ];
        });

        return response()->json($items);
    }
}
