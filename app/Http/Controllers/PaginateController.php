<?php

namespace App\Http\Controllers;

use App\Models\Paginate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaginateController extends Controller
{
    public function index() {
        $photos = Paginate::paginate();

        return view('photos.index', compact('photos'));
    }

    public function create() {
        return view('photos.create');
    }

    public function store(Request $request, Paginate $paginate){
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['image_path'] = $request->file('photo')->store('uploads/images', 'public');

        $paginate->create($data);
        return redirect()->route('paginates.index')->with('success', 'Photo uploaded successfully.');
    }

    public function show(Paginate $paginate){
        return view('photos.show', compact('paginate'));
    }

    public function edit(Paginate $paginate){
        return view('photos.edit', compact('paginate'));
    }

    public function update(Request $request, Paginate $paginate){
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('photo')){
            // delete exists photo
            Storage::delete('public/'. $paginate->image_path);

            // store new photo
            $data['image_path'] = $request->file('photo')->store('uploads/images', 'public');
        }
        $paginate->update($data);

        return redirect()->route('paginates.index')->with('success',  'Photo updated successfully.');
    }

    public function destroy(Paginate $paginate){
        Storage::delete('public/'. $paginate->image_path);

        $paginate->delete();
        return redirect()->route('paginates.index')->with('success', 'Photo deleted successfully.');
    }
}
