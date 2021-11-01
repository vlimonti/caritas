<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard.index');
    }

    public function userProfile()
    {
        $user = auth()->user();

        return view('admin.pages.users.profile', compact('user'));
    }
}
