<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $skillId = $request->input('skill');

        $projects = Project::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
        })->when($skillId, function ($query, $skillId) {
            return $query->whereHas('skills', function ($query) use ($skillId) {
                $query->where('skill_id', $skillId);
            });
        })->orderBy('created_at', 'desc')
          ->paginate(6);
        
        $skills = Skill::all();

        if ($request->ajax()) {
            return view('partials.list', compact('projects'))->render();
        }

        return view('index', compact('projects', 'skills'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('show', compact('project'));
    }
}
