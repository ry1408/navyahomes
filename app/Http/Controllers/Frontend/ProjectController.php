<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::where('status', 'active')
            ->with('plots')
            ->paginate(9);

        return view('frontend.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('plots');
        $stats = $project->getStatsAttribute();
        
        return view('frontend.projects.show', compact('project', 'stats'));
    }
}
