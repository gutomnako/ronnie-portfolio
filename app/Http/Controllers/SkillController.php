<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        Skill::create([
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill added successfully!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        $skill->update([
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill deleted successfully!');
    }
}