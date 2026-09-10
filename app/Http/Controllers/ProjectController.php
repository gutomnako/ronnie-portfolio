<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\AboutMe;
use Illuminate\Http\Request;
use App\Models\Skill;

class ProjectController extends Controller
{
    // Show all projects on the portfolio
    public function index()
    {
        $projects = Project::latest()->get();
        $aboutMe = AboutMe::first();
        $skills = Skill::latest()->get();

        return view('home', compact('projects', 'aboutMe', 'skills'));
    }

    // Show the Add Project form
    public function create()
    {
        return view('admin.projects-create');
    }

    // Show projects in the admin page
    public function adminIndex()
    {
        $projects = Project::latest()->get();

        return view('admin.projects-index', compact('projects'));
    }
    // Show the edit project form
    public function edit(Project $project)
    {
        return view('admin.projects-edit', compact('project'));

    }

    // Update the project
    public function update(Request $request, Project $project)
    {
    $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'image' => 'nullable|image|max:20480',
    'url' => 'nullable|url',
    ]);

    $data = [
        'title' => $request->title,
        'description' => $request->description,
        'url' => $request->url,
    ];

    if ($request->hasFile('image')) {

        // Delete the old image
        if ($project->image && \Storage::disk('public')->exists($project->image)) {
            \Storage::disk('public')->delete($project->image);
        }

        // Store the new image
        $data['image'] = $request->file('image')->store('projects', 'public');
    }

    $project->update($data);

    return redirect()
        ->route('projects.index')
        ->with('success', 'Project updated successfully!');

    }


    // Delete the project
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }



    // Save the project to the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:5120',
            'url' => 'nullable|url',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect('/admin/projects/create')
            ->with('success', 'Project added successfully!');
    }

   public function dashboard()
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $aboutMe = AboutMe::first();

        return view('admin.dashboard', compact(
            'projectCount',
            'skillCount',
            'aboutMe'
        ));
    }
}
