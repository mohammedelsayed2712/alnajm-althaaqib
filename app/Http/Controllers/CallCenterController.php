<?php

namespace App\Http\Controllers;

use App\Models\CallCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CallCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $callCenters = CallCenter::all();
        return view('call_centers.index', compact('callCenters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('call_centers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'icon1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'icon2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $callCenter = new CallCenter();
        $callCenter->img = $request->file('img');
        $callCenter->name = $request->input('name');
        $callCenter->icon1 = $request->file('icon1');
        $callCenter->icon2 = $request->file('icon2');

        if ($request->hasFile('img')) {
            $callCenter->img = $request->file('img')->store('uploads/callCenters', 'public');
        }
        if ($request->hasFile('icon1')) {
            $callCenter->icon1 = $request->file('icon1')->store('uploads/callCenter', 'public');
        }
        if ($request->hasFile('icon2')) {
            $callCenter->icon2 = $request->file('icon2')->store('uploads/callCenter', 'public');
        }
        $callCenter->save();

        return redirect()->route('call_centers.index')->with('success', 'CallCenter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CallCenter $callCenter)
    {
        return view('call_centers.show', compact('callCenter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CallCenter $callCenter)
    {
        return view('call_centers.edit', compact('callCenter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'icon1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'icon2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $callCenter = CallCenter::findOrFail($id);
        $callCenter->img = $request->file('img');
        $callCenter->name = $request->input('name');
        $callCenter->icon1 = $request->file('icon1');
        $callCenter->icon2 = $request->file('icon2');

        if ($request->hasFile('img')) {
            if ($callCenter->img && Storage::exists('public/' . $callCenter->img)) {
                Storage::delete('public/' . $callCenter->img);
            }
            $callCenter->img = $request->file('img')->store('uploads/callCenters', 'public');
        }
        if ($request->hasFile('icon1')) {
             if($callCenter->icon1 && Storage::exists('public/' . $callCenter->icon1)){
            Storage::delete('public/' . $callCenter->icon1);
             }
             $callCenter->icon1 = $request->file('icon1')->store('uploads/callCenter', 'public');
        }

        if ($request->hasFile('icon2')) {
             if ($callCenter->icon2 && Storage::exists('public/' . $callCenter->icon2)) {
                Storage::delete('public/' . $callCenter->icon2);
            }
            $callCenter->icon2 = $request->file('icon2')->store('uploads/callCenter', 'public');
        }

        $callCenter->save();

        return redirect()->route('call_centers.index')->with('success', 'Call Center updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CallCenter $callCenter)
    {
        if ($callCenter->img) {
            Storage::delete('public/' . $callCenter->img);
        }

        if ($callCenter->icon1) {
            Storage::delete('public/' . $callCenter->icon1);
        }
        if ($callCenter->icon2) {
            Storage::delete('public/' . $callCenter->icon2);
        }

        $callCenter->delete();

        return redirect()->route('call_centers.index')->with('success', 'Nationality deleted successfully.');
    }
}
