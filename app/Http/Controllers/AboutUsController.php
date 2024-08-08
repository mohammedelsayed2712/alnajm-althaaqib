<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index(){
        $aboutUs = AboutUs::all();

        return view('about_us.index', compact('aboutUs'));
    }

    public function create(){
        return view('about_us.create');
    }

    public function store(AboutUsRequest $request) {
        $data = $request -> validated();

        if($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('uploads/photos', 'public');
        }

        AboutUs::create($data);

        return redirect()->route('about_us.index')->with('success', 'About Us section created successfully.');
    }

    public function edit(AboutUs $aboutUs){
        return view('about_us.edit', compact('aboutUs'));
    }

    public function update(AboutUsRequest $request, AboutUs $aboutUs) {
        $data = $request->validated();

        if($request->hasFile('image')) {
            Storage::delete('public/'. $aboutUs->image_path);
        }
        $data['image_path'] = $request->file('image')->store('uploads/photos', 'public');

        $aboutUs->update($data);

        return redirect()->route('about_us.index')->with('success', 'About Us section updated successfully.');
    }

    public function destroy(AboutUs $aboutUs){
        if($aboutUs -> image_path){
            Storage::delete('public/'. $aboutUs->image_path);
        }

        $aboutUs->delete();

        return redirect()->route('about_us.index')->with('success', 'About Us section deleted successfully.');
    }
}