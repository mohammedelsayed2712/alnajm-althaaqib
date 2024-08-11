<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutServiceRequest;
use App\Models\AboutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutServiceController extends Controller
{
    public function index() {
        $services = AboutService::where('is_active', true)->get();
        // $services = AboutService::get();
        return view('aboutService.index', compact('services'));
    }

    public function create() {
        return view('aboutService.create');
    }

    public function store(AboutServiceRequest $request) {
        $request->validated();

        $imagePath = $request->file('image')->store('uploads/photos', 'public');

        AboutService::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('about_service.index')->with('success', 'Service created successfully');
    }

    public function edit(AboutService $aboutService){
        return view('aboutService.edit', compact('aboutService'));
    }

    public function update(AboutServiceRequest $request, AboutService $aboutService){
        $data = $request->validated();
        if($request->hasFile('image')) {
            // Remove existing photo
            Storage::delete('public/'. $aboutService->image);

        }
        // Adding new photo
        $data['image'] = $request->file('image')->store('uploads/photoss', 'public');
        $aboutService->update($data);

        return redirect()->route('about_service.index')->with('success', 'Service updated successfully');
    }

    public function destroy(AboutService $aboutService){
        // if($aboutUs -> image_path){
        //     Storage::delete('public/'. $aboutUs->image_path);
        // }
        if($aboutService->image){
            Storage::delete('public/'. $aboutService->image);
        }
        $aboutService->delete();

        return redirect()->route('about_service.index')->with('success', 'Service deleted successfully');
    }
}
