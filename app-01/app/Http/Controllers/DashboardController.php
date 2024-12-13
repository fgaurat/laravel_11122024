<?php

namespace App\Http\Controllers;

use App\Jobs\ScrapeArticles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function launch_job()
    {
        ScrapeArticles::dispatch(Auth::user()->id);
        return redirect('/dashboard');
    }


}
