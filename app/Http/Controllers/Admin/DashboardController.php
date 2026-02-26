<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // TODO: Fetch KPI data, analytics
        return view('admin.dashboard');
    }
}
