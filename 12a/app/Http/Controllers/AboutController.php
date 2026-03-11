<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $projects = Project::latest()->get();
        $skills   = Skill::orderBy('order')->get();

        return view('about', compact('projects', 'skills'));
    }
}