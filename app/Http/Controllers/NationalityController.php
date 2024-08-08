<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nationalities = Nationality::all();
        return view('nationalities.index', compact('nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalities = Nationality::all();
        return view('nationalities.create', compact('nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validate the request
          $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'name_countries' => 'nullable|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }
         Nationality::create($request->all());


        // Redirect to the index page
        return redirect()->route('nationalities.index')->with('success', 'Country added successfully.');
    }
    //     $request->validate([
    //         'name' => 'required',
    //         'status' => 'required|in:active,inactive',
            // 'name_countries' => 'required',
            // 'img'=>'required',

        // ]);

        // Nationality::create($request->all());

        // return redirect()->route('nationalities.index')
        //                  ->with('success', 'Nationality created successfully.');


    public function show(string $id)
    {
        $nationality = Nationality::findOrFail($id);
        return view('nationalities.show', compact('nationality'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nationality = Nationality::findOrFail($id);
        return view('nationalities.edit', compact('nationality'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $nationality = Nationality::findOrFail($id);
        $nationality->update($request->all());

        return redirect()->route('nationalities.index')
                         ->with('success', 'Nationality updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nationality = Nationality::findOrFail($id);
        $nationality->delete();

        return redirect()->route('nationalities.index')
                         ->with('success', 'Nationality deleted successfully.');

    }
}
