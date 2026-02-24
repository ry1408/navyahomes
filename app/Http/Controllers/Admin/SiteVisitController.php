<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteVisit;
use App\Models\Lead;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteVisitController extends Controller
{
    /**
     * Display a listing of site visits
     */
    public function index()
    {
        $siteVisits = SiteVisit::with('lead', 'project')
            ->latest('scheduled_date')
            ->paginate(20);
        
        $stats = [
            'total' => SiteVisit::count(),
            'scheduled' => SiteVisit::where('status', 'scheduled')->count(),
            'completed' => SiteVisit::where('status', 'completed')->count(),
            'cancelled' => SiteVisit::where('status', 'cancelled')->count(),
        ];
        
        return view('admin.site-visits.index', compact('siteVisits', 'stats'));
    }

    /**
     * Show form for creating new site visit
     */
    public function create()
    {
        $leads = Lead::where('status', '!=', 'converted')->get();
        $projects = Project::where('status', 'active')->get();
        
        return view('admin.site-visits.create', compact('leads', 'projects'));
    }

    /**
     * Store a newly created site visit
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'project_id' => 'required|exists:projects,id',
            'scheduled_date' => 'required|date|after:today',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'notes' => 'nullable|string|max:1000',
        ]);

        SiteVisit::create($validated);

        return redirect()->route('admin.site-visits.index')
            ->with('success', 'Site visit scheduled successfully!');
    }

    /**
     * Show site visit details
     */
    public function show(SiteVisit $siteVisit)
    {
        $siteVisit->load('lead', 'project');
        return view('admin.site-visits.show', compact('siteVisit'));
    }

    /**
     * Show form for editing site visit
     */
    public function edit(SiteVisit $siteVisit)
    {
        $leads = Lead::where('status', '!=', 'converted')->get();
        $projects = Project::where('status', 'active')->get();
        
        return view('admin.site-visits.edit', compact('siteVisit', 'leads', 'projects'));
    }

    /**
     * Update site visit
     */
    public function update(Request $request, SiteVisit $siteVisit)
    {
        $validated = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'project_id' => 'required|exists:projects,id',
            'scheduled_date' => 'required|date|after:today',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'status' => 'required|in:scheduled,completed,cancelled',
            'notes' => 'nullable|string|max:1000',
        ]);

        $siteVisit->update($validated);

        return redirect()->route('admin.site-visits.index')
            ->with('success', 'Site visit updated successfully!');
    }

    /**
     * Update site visit status
     */
    public function updateStatus(Request $request, SiteVisit $siteVisit)
    {
        $validated = $request->validate([
            'status' => 'required|in:scheduled,completed,cancelled',
        ]);

        $siteVisit->update($validated);

        return redirect()->back()
            ->with('success', 'Site visit status updated!');
    }

    /**
     * Delete site visit
     */
    public function destroy(SiteVisit $siteVisit)
    {
        $siteVisit->delete();

        return redirect()->route('admin.site-visits.index')
            ->with('success', 'Site visit deleted successfully!');
    }
}
