<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(): Response 
    {
        return Inertia::render('Landing')->rootView('template');
    }

    public function about(): Response 
    {
        return Inertia::render('About')->rootView('template');
    }

    public function events(): Response
    {
        return Inertia::render('events/Index')->rootView('template');
    }

    public function eventDetails(String $slug): Response
    {
        return Inertia::render('events/Details', ['slug' => $slug])->rootView('template');
    }

    public function blog(): Response
    {
        return Inertia::render('blog/Index')->rootView('template');
    }

    public function blogDetails(String $slug): Response
    {
        return Inertia::render('blog/Details', ['slug' => $slug])->rootView('template');
    }

    public function studentVoice(): Response
    {
        return Inertia::render('StudentVoice')->rootView('template');
    }

    public function contact(): Response
    {
        return Inertia::render('Contact')->rootView('template');
    }
}
