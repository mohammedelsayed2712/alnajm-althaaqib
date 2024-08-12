<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepresentativeRequest;
use App\Models\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepresentativeController extends Controller
{
    public function index()
    {
        $representatives = Representative::paginate(10);
        return view('services.representatives.index', compact('representatives'));
    }

    public function create()
    {
        return view('services.representatives.create');
    }

    public function store(RepresentativeRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('representatives', 'public');
        }

        Representative::create($data);
        return redirect()->route('representatives.index')->with('success', 'Representative created successfully.');
    }

    public function edit(Representative $representative)
    {
        return view('services.representatives.edit', compact('representative'));
    }

    public function update(RepresentativeRequest $request, Representative $representative)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('representatives', 'public');
        } else {
            $data['image'] = $representative->image;
        }

        $representative->update($data);
        return redirect()->route('representatives.index')->with('success', 'Representative updated successfully.');
    }

    public function destroy(Representative $representative)
    {
        if($representative->image){
            Storage::delete('public/'. $representative->image);
        }
        $representative->delete();

        return redirect()->route('representatives.index')->with('success', 'Representative deleted successfully.');
    }
}
