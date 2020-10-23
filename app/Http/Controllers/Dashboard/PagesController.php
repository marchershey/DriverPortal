<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dispatch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $dispatches = Dispatch::where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('dashboard.index', compact('dispatches'));
    }
}
