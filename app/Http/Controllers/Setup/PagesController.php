<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function profile()
    {
        if (Auth::user()->setup_completed == 1) {
            return redirect()->route('dashboard.index');
        }

        return view('frontend.setup.profile.index');
    }
}
