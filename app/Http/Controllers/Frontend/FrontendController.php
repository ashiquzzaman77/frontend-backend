<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $banner = Banner::where('status', 'active')->latest('id')->first();
        $about = About::where('status', 'active')->latest('id')->first();
        $teams = Team::where('status', 'active')->latest()->limit('3')->get();
        $testimonials = Testimonial::where('status', 'active')->latest()->limit('5')->get();

        return view('frontend.index', compact('banner','about','teams','testimonials'));
    }
}
