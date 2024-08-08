<?php

namespace App\Http\Controllers;

use App\Http\Requests\CVRequest;
use App\Models\Country;
use App\Models\Cv;
use App\Models\Experience;
use App\Models\Job;
use App\Models\Religion;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index() {
        $cvs = Cv::with(['country', 'status', 'job', 'religion', 'experience'])->get();
      
        return view('cv.index', compact('cvs'));
    }

    public function create() {
        $countries = Country::all();
        $jobs = Job::all();
        $religions = Religion::all();
        $statuses = Status::all();
        $experiences = Experience::all();

        return view('cv.create', compact('countries', 'jobs', 'religions', 'statuses', 'experiences'));
    }

    public function store(CVRequest $request){
        
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads/photos', 'public');
        }
        
        Cv::create($data);

        return redirect()->route('cvs.index')->with('success', 'CV created successfully.');
    }

    public function show(Cv $cv){
        return view('cv.show', compact('cv'));
    }

    public function edit(Cv $cv){
        $countries = Country::all();
        $jobs = Job::all();
        $religions = Religion::all();
        $statuses = Status::all();
        $experiences = Experience::all();

        return view('cv.edit', compact('cv', 'countries', 'jobs', 'religions', 'statuses', 'experiences'));
    }

    public function update(CVRequest $request, Cv $cv){
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            if ($cv->photo) {
                Storage::delete($cv->photo);
            } 
            // Store the new photo
            $data['photo'] = $request->file('photo')->store('uploads/photos', 'public');
            $cv->photo = $data['photo'];
        }
        $cv->update($data);

        return redirect()->route('cvs.index')->with('success', 'Cv updated successfully.');
    }

    public function destroy(Cv $cv){
        $cv->delete();

        return redirect()->route('cvs.index')->with('success', 'CV deleted successfully.');
    }
}
