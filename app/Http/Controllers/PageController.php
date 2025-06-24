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
        return Inertia::render('events/Index');
    }

    public function eventDetails( String $slug): Response
    {
        return Inertia::render('events/Details', ['slug' => $slug]);
    }

    public function blog(): Response
    {
        return Inertia::render('blog/Index');
    }

    public function blogDetails( String $slug): Response
    {
        return Inertia::render('blog/Details', ['slug' => $slug]);
    }

    public function studentVoice(): Response
    {
        return Inertia::render('StudentVoice');
    }

    public function contact(): Response
    {
        return Inertia::render('Contact');
    }
}
