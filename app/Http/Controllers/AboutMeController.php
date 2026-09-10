<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    public function index()
    {
        $aboutMe = AboutMe::first();

        return view('admin.about.index', compact('aboutMe'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $aboutMe = AboutMe::first();

        if (!$aboutMe) {
            $aboutMe = AboutMe::create([
                'content' => $request->content,
            ]);
        } else {
            $aboutMe->update([
                'content' => $request->content,
            ]);
        }

        return redirect()
            ->route('about.index')
            ->with('success', 'About Me updated successfully!');
    }
}