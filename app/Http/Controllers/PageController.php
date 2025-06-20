<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(): Response 
    {
        return Inertia::render('Landing');
    }

    public function about(): Response 
    {
        return Inertia::render('About');
    }

    public function events(): Response
    {
        return Inertia::render('Events');
    }

    public function blog(): Response
    {
        return Inertia::render('Blog');
    }

    public function studentVoice(): Response
    {
        return Inertia::render('StudentVoice');
    }
}
