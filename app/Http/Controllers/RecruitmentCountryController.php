<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecruitmentCountriesRequest;
use App\Models\RecruitmentCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecruitmentCountryController extends Controller
{
    public function index() {
        $recruitmentCountries = RecruitmentCountry::where('is_active', true)->get();

        return view('RecruitmentCountries.index', compact('recruitmentCountries'));
    }

    public function create() {
        return view('RecruitmentCountries.create');
    }

    public function store(RecruitmentCountriesRequest $request) {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('uploads/photos', 'public');

        RecruitmentCountry::create($data);

        return redirect()->route('recruitmentCountries.index')->with('success', 'Recruitment Country created successfully.');
    }

    public function show(RecruitmentCountry $recruitmentCountry) {
        return view('RecruitmentCountries.show', compact('recruitmentCountry'));
    }

    public function edit(RecruitmentCountry $recruitmentCountry) {
        return view('RecruitmentCountries.edit', compact('recruitmentCountry'));
    }

    public function update(RecruitmentCountriesRequest $request, RecruitmentCountry $recruitmentCountry){
        $data = $request->validated();
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('uploads/photos', 'public');
        }else{
            $data['image'] = $recruitmentCountry->image;
        }

        $recruitmentCountry->update($data);
        return redirect()->route('recruitmentCountries.index')->with('success', 'Recruitment Country updated successfully.');
    }

    public function destroy(RecruitmentCountry $recruitmentCountry) {
        if($recruitmentCountry->image){
            Storage::delete('public/'. $recruitmentCountry->image);
        }
        
        $recruitmentCountry->delete();
        return redirect()->route('recruitmentCountries.index')->with('success', 'Recruitment Country deleted successfully.');
    }
}
