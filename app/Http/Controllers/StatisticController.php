<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticRequest;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index() {
        $statistics = Statistic::where('is_active', true)->get();

        return view('statistics.index', compact('statistics'));
    }

    public function create() {
        return view('statistics.create');
    }

    public function store(StatisticRequest $request) {
        $request->validated();

        Statistic::create($request->all());
        return redirect()->route('statistics.index')->with('success', 'Statistic created successfully.');
    }

    public function edit(Statistic $statistic) {
        return view('statistics.edit', compact('statistic'));
    }

    public function update(StatisticRequest $request, Statistic $statistic) {
        $request->validated();

        $statistic->update($request->all());
        return redirect()->route('statistics.index')->with('success', 'Statistic updated successfully.');
    }
    
    public function destroy(Statistic $statistic) {
        $statistic->delete();
        return redirect()->route('statistics.index')->with('success', 'Statistic deleted successfully.');
    }
}
