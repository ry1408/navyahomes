<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::with('plots')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_sqft' => 'required|numeric|min:0',
            'total_plots' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video_url' => 'nullable|string|max:255',
            'brochure_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_featured_' . $image->getClientOriginalName();
            $image->move(public_path('images/projects'), $imageName);
            $validated['featured_image'] = 'images/projects/' . $imageName;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $index => $image) {
                $imageName = time() . '_gallery_' . $index . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/projects'), $imageName);
                $galleryPaths[] = 'images/projects/' . $imageName;
            }
            $validated['gallery_images'] = $galleryPaths;
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            $video = $request->file('video_file');
            $videoName = time() . '_video_' . $video->getClientOriginalName();
            $video->move(public_path('videos/projects'), $videoName);
            $validated['video_url'] = 'videos/projects/' . $videoName;
        }

        // Handle brochure upload
        if ($request->hasFile('brochure_pdf')) {
            $pdf = $request->file('brochure_pdf');
            $pdfName = time() . '_brochure_' . $pdf->getClientOriginalName();
            $pdf->move(public_path('pdfs/projects'), $pdfName);
            $validated['brochure_pdf'] = 'pdfs/projects/' . $pdfName;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_sqft' => 'required|numeric|min:0',
            'total_plots' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video_url' => 'nullable|string|max:255',
            'brochure_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($project->featured_image && file_exists(public_path($project->featured_image))) {
                unlink(public_path($project->featured_image));
            }
            
            $image = $request->file('featured_image');
            $imageName = time() . '_featured_' . $image->getClientOriginalName();
            $image->move(public_path('images/projects'), $imageName);
            $validated['featured_image'] = 'images/projects/' . $imageName;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $index => $image) {
                $imageName = time() . '_gallery_' . $index . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/projects'), $imageName);
                $galleryPaths[] = 'images/projects/' . $imageName;
            }
            $validated['gallery_images'] = $galleryPaths;
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            // Delete old video if exists
            if ($project->video_url && file_exists(public_path($project->video_url))) {
                unlink(public_path($project->video_url));
            }
            
            $video = $request->file('video_file');
            $videoName = time() . '_video_' . $video->getClientOriginalName();
            $video->move(public_path('videos/projects'), $videoName);
            $validated['video_url'] = 'videos/projects/' . $videoName;
        }

        // Handle brochure upload
        if ($request->hasFile('brochure_pdf')) {
            // Delete old PDF if exists
            if ($project->brochure_pdf && file_exists(public_path($project->brochure_pdf))) {
                unlink(public_path($project->brochure_pdf));
            }
            
            $pdf = $request->file('brochure_pdf');
            $pdfName = time() . '_brochure_' . $pdf->getClientOriginalName();
            $pdf->move(public_path('pdfs/projects'), $pdfName);
            $validated['brochure_pdf'] = 'pdfs/projects/' . $pdfName;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}
