<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.pages.home.index');
    }

    public function plan($url)
    {
        if(! $plan = Plan::where('url', $url)->first() ) {
            return redirect()->back();
        }
        session()->put('plan', $plan);

        return redirect()->route('register');
    }

    public function login()
    {
        return redirect()->route('login');
    }

    public function plans()
    {
        $plans = Plan::with('details')->orderBy('price', 'ASC')->get();
        //return view('vendor.adminlte.auth.login');
        return view('site.pages.plans.index', compact('plans'));
    }

    public function about()
    {
        return view('site.pages.about.index');
    }
}
