<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use App\Models\Project;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    public function index(Request $request)
    {
        $query = Plot::with('project');

        // Filter by price
        if ($request->filled('min_price')) {
            $query->where('total_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('total_price', '<=', $request->max_price);
        }

        // Filter by area
        if ($request->filled('min_area')) {
            $query->where('area_sqft', '>=', $request->min_area);
        }
        if ($request->filled('max_area')) {
            $query->where('area_sqft', '<=', $request->max_area);
        }

        // Filter by project
        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $plots = $query->paginate(12);
        $projects = Project::where('status', 'active')->get();

        return view('frontend.plots.index', compact('plots', 'projects'));
    }

    public function show(Project $project, Plot $plot)
    {
        // Ensure the plot belongs to the project
        if ($plot->project_id !== $project->id) {
            abort(404);
        }
        
        $plot->load('project');
        $relatedPlots = Plot::where('project_id', $plot->project_id)
            ->where('id', '!=', $plot->id)
            ->limit(4)
            ->get();

        return view('frontend.plots.show', compact('plot', 'relatedPlots'));
    }
}
