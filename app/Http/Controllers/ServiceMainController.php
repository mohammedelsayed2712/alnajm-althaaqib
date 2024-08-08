<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceMain;

class ServiceMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceMain::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        ServiceMain::create([
            'img' => $imageName,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $services =ServiceMain::findOrFail($id);
        return view('services.show', compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services =ServiceMain::findOrFail($id);
        return view('services.edit', compact('services'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);
        $services = ServiceMain::findOrFail($id);
        $services->update($request->all());

        if ($request->hasFile('img')) {
            if (file_exists(public_path('images/'.$services->img))) {
                unlink(public_path('images/'.$services->img));
            }

            //
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $services->img = $imageName;
            $services->save();
        }

        return redirect()->route('services.index')
                         ->with('success', 'Services updated successfully.');


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $services = ServiceMain::findOrFail($id);
        $services->delete();
        $services->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
