<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Plot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('status', 'active')->take(3)->get();
        $totalPlots = Plot::count();
        $availablePlots = Plot::where('status', 'available')->count();
        $soldPlots = Plot::where('status', 'sold')->count();

        return view('frontend.home', compact('featuredProjects', 'totalPlots', 'availablePlots', 'soldPlots'));
    }
}
