<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRecruitmentRequest;
use App\Models\ServiceRecruitmentCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceRecruitmentController extends Controller
{
    public function index() {
        $services = ServiceRecruitmentCard::where('is_active', true)->get();
        // $services = ServiceRecruitmentCard::get();
        return view('services.Recruitment.index', compact('services'));
    }

    public function create() {
        return view('services.Recruitment.create');
    }

    public function store(ServiceRecruitmentRequest $request) {
        $request->validated();

        $imagePath = $request->file('image')->store('uploads/photos', 'public');

        ServiceRecruitmentCard::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('about_service.index')->with('success', 'Service created successfully');
    }

    public function show(ServiceRecruitmentCard $serviceRecruitmentCard){
        return view('services.Recruitment.show', compact('serviceRecruitmentCard'));
    }

    public function edit(ServiceRecruitmentCard $serviceRecruitmentCard){
        return view('services.Recruitment.edit', compact('serviceRecruitmentCard'));
    }

    public function update(ServiceRecruitmentRequest $request, ServiceRecruitmentCard $aboutService){
        $data = $request->validated();
        if($request->hasFile('image')) {
            // Remove existing photo
            Storage::delete('public/'. $aboutService->image);

        }
        // Adding new photo
        $data['image'] = $request->file('image')->store('uploads/photos', 'public');
        $aboutService->update($data);

        return redirect()->route('about_service.index')->with('success', 'Service updated successfully');
    }

    public function destroy(ServiceRecruitmentCard $serviceRecruitmentCard){
        if($serviceRecruitmentCard->image){
            Storage::delete('public/'. $serviceRecruitmentCard->image);
        }
        $serviceRecruitmentCard->delete();

        return redirect()->route('about_service.index')->with('success', 'Service deleted successfully');
    }
}
