<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class StudentDashboardController extends Controller
{
    function index() : View {
        return view('frontend.student-dashboard.index');
    }
}
