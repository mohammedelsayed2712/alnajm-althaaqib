<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nationalities=Nationality::all();
        return view('nationality.index', compact('nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nationality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name'=>'required|string|max:255',
                'text'=>'required|string|max:255',
                'price'=>'required|numeric',
                'icon'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

        $nationality=new Nationality();
        // $nationality->img=$request->file('img');
        $nationality->name=$request->input('name');
        $nationality->text=$request->input('text');
        $nationality->price=$request->input('price');
        $nationality->icon=$request->file('icon');

        if ($request->hasFile('img')) {
            $nationality->img = $request->file('img')->store('uploads/nationalities', 'public');
        }

        if ($request->hasFile('icon')) {
            $nationality->icon = $request->file('icon')->store('uploads/icons', 'public');
        }

        $nationality->save();

        return redirect()->route('nationality.index')->with('success','Nationality created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( Nationality $nationality)
    {
        return view('nationality.show',compact('nationality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nationality $nationality)
    {
        return view('nationality.edit',compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name'=>'required|string|max:255',
                'text'=>'required|string|max:255',
                'price'=>'required|numeric',
                'icon'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

       // $nationality=new Nationality();
        $nationality = Nationality::findOrFail($id);
         $nationality->img=$request->file('img');
        $nationality->name=$request->input('name');
        $nationality->text=$request->input('text');
        $nationality->price=$request->input('price');
         $nationality->icon=$request->file('icon');

        if($request->hasFile('img')){
            if($nationality->img && Storage::exists('public/' . $nationality->img)){
                Storage::delete('public/'.$nationality->img);
            }
        $nationality->img = $request->file('img')->store('uploads/nationalities','public');
    }
        if ($request->hasFile('icon')){
            if($nationality->icon&& Storage::exists('public/' . $nationality->icon)){
                Storage::delete('public/'.$nationality->icon);
            }
        $nationality->icon = $request->file('icon')->store('uploads/icons','public');
}
        $nationality->save();

        return redirect()->route('nationality.index')->with("success",'Nationality section updated successfully.');
}





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nationality $nationality)
    {
        if ($nationality->img) {
            Storage::delete('public/' . $nationality->img);
        }

        if ($nationality->icon) {
            Storage::delete('public/' . $nationality->icon);
        }

        $nationality->delete();

        return redirect()->route('nationality.index')->with('success', 'Nationality deleted successfully.');
    }
}
