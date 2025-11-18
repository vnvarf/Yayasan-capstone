<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SectionCarousel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get carousel items count
        $carouselCount = SectionCarousel::count();

        // Get users count
        $userCount = User::count();

        // Get last login days
        $lastLoginDays = 0; // You can implement this feature if you have a last_login field in your users table

        // Get recent carousel items
        $recentCarouselItems = SectionCarousel::latest()->take(5)->get();

        return view('admin.dashboard', compact('carouselCount', 'userCount', 'lastLoginDays', 'recentCarouselItems'));
    }
}
