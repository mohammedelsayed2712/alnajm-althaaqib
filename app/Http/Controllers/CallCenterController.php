<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallCenter;
use Illuminate\Support\Facades\Storage;

class CallCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $callCenters= CallCenter::all();
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


        $imageName = time().'_img.'.$request->img->extension();
        $request->img->move(public_path('images'), $imageName);


        $icon1Name = time().'_icon1.'.$request->icon1->extension();
        $request->icon1->move(public_path('icons'), $icon1Name);


        $icon2Name = time().'_icon2.'.$request->icon2->extension();
        $request->icon2->move(public_path('icons'), $icon2Name);

        CallCenter::create([
            'img' => $imageName,
            'name' => $request->name,
            'icon1' => $icon1Name,
            'icon2' => $icon2Name,
        ]);

        return redirect()->route('call_centers.index')->with('success', 'CallCenter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $callCenter = CallCenter::findOrFail($id);
        return view('call_centers.show', compact('callCenter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $callCenter = CallCenter::findOrFail($id);
        return view('call_centers.edit', compact('callCenter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        // $request->validate([
        //     'img' => 'image|mimes:jpeg,png,jpg|max:2048',
        //     'name' => 'required|string|max:255',
        //     'icon1' => 'image|mimes:jpeg,png,jpg|max:2048',
        //     'icon2' => 'image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // $callCenter = CallCenter::findOrFail($id);

        // if (!isset($callCenter)) {
        //     return redirect()->back()->with('error', 'Call Center not found.');
        // }

        // if ($request->hasFile('img')) {
        //     if (file_exists(public_path('images/'.$callCenter->img))) {
        //         unlink(public_path('images/'.$callCenter->img));
        //     }

        //     $imageName = time().'_img.'.$request->img->extension();
        //     $request->img->move(public_path('images'), $imageName);
        //     $callCenter->img = $imageName;
        // }
        // if ($request->hasFile('icon1')) {
        //     if (file_exists(public_path('icons/'.$callCenter->icon1))) {
        //         unlink(public_path('icons/'.$callCenter->icon1));
        //     }

        //     $icon1Name = time().'_icon1.'.$request->icon1->extension();
        //     $request->icon1->move(public_path('icons'), $icon1Name);
        //     $callCenter->icon1 = $icon1Name;
        // }

        // if ($request->hasFile('icon2')) {
        //     if (file_exists(public_path('icons/'.$callCenter->icon2))) {
        //         unlink(public_path('icons/'.$callCenter->icon2));
        //     }

        //     $icon2Name = time().'_icon2.'.$request->icon2->extension();
        //     $request->icon2->move(public_path('icons'), $icon2Name);
        //     $callCenter->icon2 = $icon2Name;
        // }
        // mohammed elsayed
        // if($request->hasFile('icon2')){
        //     Storage::delete('public/'. );
        // }

        // $callCenter->name = $request->name;
        // $callCenter->save();

        return redirect()->route('call_centers.index')->with('success', 'Call Center updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
   // Retrieve the CallCenter object by its ID
   $callCenter = CallCenter::find($id);

   // Check if the CallCenter object exists
   if (!$callCenter) {
       return redirect()->route('call_centers.index')->with('error', 'CallCenter not found.');
   }

   // Check and delete the image if it exists
   if (file_exists(public_path('images/'.$callCenter->img))) {
       unlink(public_path('images/'.$callCenter->img));
   }

   // Check and delete the first icon if it exists
   if (file_exists(public_path('icons/'.$callCenter->icon1))) {
       unlink(public_path('icons/'.$callCenter->icon1));
   }

   // Check and delete the second icon if it exists
   if (file_exists(public_path('icons/'.$callCenter->icon2))) {
       unlink(public_path('icons/'.$callCenter->icon2));
   }

   // Delete the CallCenter object
   $callCenter->delete();

   // Redirect with success message
   return redirect()->route('call_centers.index')->with('success', 'CallCenter deleted successfully.');


    }
}
