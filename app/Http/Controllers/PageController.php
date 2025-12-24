<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function home()
    {
        $services     = Service::where('is_featured', true)->take(6)->get();
        $projects     = Project::latest()->take(6)->get();
        $testimonials = Testimonial::where('is_featured', true)->take(6)->get();

        return view('pages.home', compact('services','projects','testimonials'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $services = Service::all();
        return view('pages.services', compact('services'));
    }

    public function serviceShow($slug)
    {
        $service  = Service::where('slug',$slug)->firstOrFail();
        $projects = $service->projects()->latest()->get();
        return view('pages.service-show', compact('service','projects'));
    }

    public function projects()
    {
        $projects = Project::latest()->paginate(9);
        return view('pages.projects', compact('projects'));
    }

    public function projectShow($slug)
    {
        $project = Project::where('slug',$slug)->with('images','service')->firstOrFail();
        return view('pages.project-show', compact('project'));
    }

    // public function reviews()
    // {
    //     $testimonials = Testimonial::latest()->paginate(12);
    //     return view('pages.reviews', compact('testimonials'));
    // }
    public function contact()
{
    return view('pages.contact');
}
public function reviews()
{
    $testimonials = Testimonial::latest()->paginate(12);

    $userReview = null;
    if (Auth::check()) {
        $userReview = Testimonial::where('user_id', Auth::id())->first();
    }

    return view('pages.reviews', compact('testimonials', 'userReview'));
}
public function contactT()
{
    return view('pages.contactT');
}
}
