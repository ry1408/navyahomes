<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plot;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PlotController extends Controller
{
    /**
     * Display a listing of plots.
     */
    public function index()
    {
        $plots = Plot::with('project')->paginate(20);
        return view('admin.plots.index', compact('plots'));
    }

    /**
     * Show the form for creating a new plot.
     */
    public function create()
    {
        $projects = Project::where('status', 'active')->get();
        return view('admin.plots.create', compact('projects'));
    }

    /**
     * Store a newly created plot in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'plot_number' => 'required|string|max:50',
            'area_sqft' => 'required|numeric|min:0.01',
            'status' => 'required|in:available,booked,sold',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plots', 'public');
            $validated['image'] = $imagePath;
        }

        Plot::create($validated);

        return redirect()->route('admin.plots.index')
            ->with('success', 'Plot created successfully!');
    }

    /**
     * Show the form for editing the specified plot.
     */
    public function edit(Plot $plot)
    {
        // Prevent editing of sold plots
        if ($plot->isSold()) {
            return redirect()->route('admin.plots.index')
                ->with('error', 'Sold plots cannot be edited!');
        }

        $projects = Project::where('status', 'active')->get();
        return view('admin.plots.edit', compact('plot', 'projects'));
    }

    /**
     * Update the specified plot in storage.
     */
    public function update(Request $request, Plot $plot)
    {
        // Prevent editing of sold plots
        if ($plot->isSold()) {
            return redirect()->route('admin.plots.index')
                ->with('error', 'Sold plots cannot be edited!');
        }

        $validated = $request->validate([
            'plot_number' => 'required|string|max:50',
            'area_sqft' => 'required|numeric|min:0.01',
            'status' => 'required|in:available,booked,sold',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($plot->image && Storage::disk('public')->exists($plot->image)) {
                Storage::disk('public')->delete($plot->image);
            }
            
            $imagePath = $request->file('image')->store('plots', 'public');
            $validated['image'] = $imagePath;
        }

        $plot->update($validated);

        return redirect()->route('admin.plots.index')
            ->with('success', 'Plot updated successfully!');
    }

    /**
     * Remove the specified plot from storage.
     */
    public function destroy(Plot $plot)
    {
        // Prevent deletion of sold plots
        if ($plot->isSold()) {
            return redirect()->route('admin.plots.index')
                ->with('error', 'Sold plots cannot be deleted!');
        }

        $plot->delete();

        return redirect()->route('admin.plots.index')
            ->with('success', 'Plot deleted successfully!');
    }

    /**
     * Change plot status
     */
    public function changeStatus(Request $request, Plot $plot)
    {
        // Prevent status change of sold plots
        if ($plot->isSold()) {
            return redirect()->back()
                ->with('error', 'Sold plots cannot change status!');
        }

        $validated = $request->validate([
            'status' => 'required|in:available,booked,sold',
        ]);

        $plot->update($validated);

        return redirect()->back()
            ->with('success', 'Plot status updated successfully!');
    }
}
