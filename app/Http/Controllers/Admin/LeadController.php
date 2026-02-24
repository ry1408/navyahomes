<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lead;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{
    /**
     * Display a listing of leads
     */
    public function index()
    {
        $leads = Lead::with('project', 'plot')
            ->latest()
            ->paginate(20);
        
        $stats = [
            'total' => Lead::count(),
            'new' => Lead::where('status', 'new')->count(),
            'contacted' => Lead::where('status', 'contacted')->count(),
            'converted' => Lead::where('status', 'converted')->count(),
        ];
        
        return view('admin.leads.index', compact('leads', 'stats'));
    }

    /**
     * Show lead detail
     */
    public function show(Lead $lead)
    {
        $lead->load('project', 'plot', 'siteVisits');
        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Update lead status
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,converted',
        ]);

        if ($validated['status'] === 'contacted' && !$lead->contacted_at) {
            $lead->contacted_at = now();
        }

        if ($validated['status'] === 'converted' && !$lead->converted_at) {
            $lead->converted_at = now();
        }

        $lead->update($validated);

        return redirect()->back()
            ->with('success', 'Lead status updated successfully!');
    }

    /**
     * Update lead notes
     */
    public function updateNotes(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'notes' => 'required|string|max:1000',
        ]);

        $lead->update($validated);

        return redirect()->back()
            ->with('success', 'Lead notes updated successfully!');
    }

    /**
     * Delete lead
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('admin.leads.index')
            ->with('success', 'Lead deleted successfully!');
    }
}
