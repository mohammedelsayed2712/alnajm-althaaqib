<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequirementRequest;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public function index() {
        $requirements = Requirement::where('is_active', true)->get();

        return view('requirements.index', compact('requirements'));
    }

    public function create() {
        return view('requirements.create');
    }

    public function store(RequirementRequest $request) {
        $request->validated();

        Requirement::create($request->all());
        return redirect()->route('requirements.index')->with('success', 'Requirement created successfully.');
    }

    public function edit(Requirement $requirement) {
        return view('requirements.edit', compact('requirement'));
    }

    public function update(RequirementRequest $request, Requirement $requirement) {
        $request->validated();

        $requirement->update($request->all());
        return redirect()->route('requirements.index')->with('success', 'Requirement updated successfully.');
    }
    
    public function destroy(Requirement $requirement) {
        $requirement->delete();
        return redirect()->route('requirements.index')->with('success', 'Requirement deleted successfully.');
    }
}
