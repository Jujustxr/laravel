<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LoadingController extends Controller
{
    public function index(): View
    {
        return view('loading');
    }
}