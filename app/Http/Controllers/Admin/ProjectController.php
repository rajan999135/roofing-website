<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


use Intervention\Image\Facades\Image;



class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('service')->latest()->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::orderBy('title')->get();

        return view('admin.projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_id'        => ['nullable', 'exists:services,id'],
            'title'             => ['required', 'string', 'max:255'],
            'slug'              => ['nullable', 'string', 'max:255', 'unique:projects,slug'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description'       => ['required', 'string'],
            'location'          => ['nullable', 'string', 'max:255'],
            'cover_image'       => ['nullable', 'image', 'max:4096'],
            'images.*'          => ['nullable', 'image', 'max:4096'],
        ]);

        // slug
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        // store cover image
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')
                ->store('projects/cover', 'public');
        }

        $project = Project::create($data);

        // store gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('projects/gallery', 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'caption'    => null,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $services = Service::orderBy('title')->get();

        $project->load('images');

        return view('admin.projects.edit', compact('project', 'services'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'service_id'        => ['nullable', 'exists:services,id'],
            'title'             => ['required', 'string', 'max:255'],
            'slug'              => ['nullable', 'string', 'max:255', 'unique:projects,slug,' . $project->id],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description'       => ['required', 'string'],
            'location'          => ['nullable', 'string', 'max:255'],
            'cover_image'       => ['nullable', 'image', 'max:4096'],
            'images.*'          => ['nullable', 'image', 'max:4096'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }

            $data['cover_image'] = $request->file('cover_image')
                ->store('projects/cover', 'public');
        }

        $project->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('projects/gallery', 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                ]);
            }
        }
        

        return redirect()
            ->route('admin.projects.edit', $project)
            ->with('status', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // delete images from storage
        foreach ($project->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Project deleted.');
    }
}
