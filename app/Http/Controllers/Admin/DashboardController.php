<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plot;
use App\Models\Lead;
use App\Models\Project;
use App\Models\SiteVisit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get dashboard statistics
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::where('status', 'active')->count(),
            'total_plots' => Plot::count(),
            'available_plots' => Plot::where('status', 'available')->count(),
            'booked_plots' => Plot::where('status', 'booked')->count(),
            'sold_plots' => Plot::where('status', 'sold')->count(),
            'total_leads' => Lead::count(),
            'new_leads' => Lead::where('status', 'new')->count(),
            'converted_leads' => Lead::where('status', 'converted')->count(),
            'scheduled_visits' => SiteVisit::where('status', 'scheduled')->count(),
        ];

        // Calculate revenue from sold plots
        $revenue = Plot::where('status', 'sold')->sum('total_price');

        // Get recent leads
        $recent_leads = Lead::with('project', 'plot')
            ->latest()
            ->limit(10)
            ->get();

        // Get upcoming site visits
        $upcoming_visits = SiteVisit::where('status', 'scheduled')
            ->where('scheduled_date', '>=', now())
            ->orderBy('scheduled_date')
            ->limit(10)
            ->get();

        // Get daily leads data for chart
        $daily_leads = Lead::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date')
            ->toArray();

        // Get plot status distribution
        $plot_distribution = [
            'available' => Plot::where('status', 'available')->count(),
            'booked' => Plot::where('status', 'booked')->count(),
            'sold' => Plot::where('status', 'sold')->count(),
        ];

        return view('admin.dashboard', compact(
            'stats',
            'revenue',
            'recent_leads',
            'upcoming_visits',
            'daily_leads',
            'plot_distribution'
        ));
    }
}
