<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Communication;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communications = Communication::all();
        return view('communications.index', compact('communications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('communications.create');
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
            'icon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $imageName = time().'_img.'.$request->img->extension();
        $request->img->move(public_path('images'), $imageName);


        $iconName = time().'_icon.'.$request->icon->extension();
        $request->icon->move(public_path('icons'), $iconName);

        Communication::create([
            'img' => $imageName,
            'title' => $request->title,
            'desc' => $request->desc,
            'icon' => $iconName,
        ]);

        return redirect()->route('communications.index')->with('success', 'Communication created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $communication = Communication::findOrFail($id);
        return view('communications.show', compact('communication'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $communication = Communication::findOrFail($id);
        return view('communications.edit', compact('communication'));
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
            'icon' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $communication = Communication::findOrFail($id); // Initialize the $communication variable

        if ($request->hasFile('img')) {
            if (file_exists(public_path('images/'.$communication->img))) {
                unlink(public_path('images/'.$communication->img));
            }

            $imageName = time().'_img.'.$request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $communication->img = $imageName;
        }

        if ($request->hasFile('icon')) {
            if (file_exists(public_path('icons/'.$communication->icon))) {
                unlink(public_path('icons/'.$communication->icon));
            }

            $iconName = time().'_icon.'.$request->icon->extension();
            $request->icon->move(public_path('icons'), $iconName);
            $communication->icon = $iconName;
        }

        $communication->title = $request->title;
        $communication->desc = $request->desc;
        $communication->save();

        return redirect()->route('communications.index')->with('success', 'Communication updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $communication = Communication::findOrFail($id); // Initialize the $communication variable

        if (file_exists(public_path('images/'.$communication->img))) {
            unlink(public_path('images/'.$communication->img));
        }

        if (file_exists(public_path('icons/'.$communication->icon))) {
            unlink(public_path('icons/'.$communication->icon));
        }

        $communication->delete();
        return redirect()->route('communications.index')->with('success', 'Communication deleted successfully.');
    }
}
