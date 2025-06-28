<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->with('service')->latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::where('is_active', true)->get();
        return view('projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric|min:0',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'requirements' => 'required|string',
            'attachments.*' => 'nullable|file|max:10240', // 10MB max
        ]);

        $project = new Project($validated);
        $project->user_id = Auth::id();
        $project->status = 'pending';

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('project-attachments', 'public');
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize(),
                ];
            }
            $project->attachments = $attachments;
        }

        $project->save();

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
        $project->load(['service', 'messages.user']);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        $services = Service::where('is_active', true)->get();
        return view('projects.edit', compact('project', 'services'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'requirements' => 'required|string',
            'attachments.*' => 'nullable|file|max:10240',
        ]);

        // Handle new file uploads
        if ($request->hasFile('attachments')) {
            $existingAttachments = $project->attachments ?? [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('project-attachments', 'public');
                $existingAttachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize(),
                ];
            }
            $validated['attachments'] = $existingAttachments;
        }

        $project->update($validated);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        // Delete attachments
        if ($project->attachments) {
            foreach ($project->attachments as $attachment) {
                Storage::disk('public')->delete($attachment['path']);
            }
        }

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }
} 