<?php

namespace App\Http\Controllers\Dispatch;

use App\Http\Controllers\Controller;
use App\Models\Dispatch;
use App\Models\DispatchStop;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function start()
    {
        return view('dashboard.dispatch.start');
    }

    public function view($reference_number)
    {
        $dispatch = Dispatch::where('reference_number', $reference_number)->firstOrFail();
        $rates = Auth::user()->rates();
        return view('dashboard.dispatch.view', compact('dispatch', 'rates'));
    }

    public function edit($reference_number)
    {
        $dispatch = Dispatch::where('reference_number', $reference_number)->firstOrFail();
        return view('dashboard.dispatch.edit', compact('dispatch'));
    }

    public function viewStop($reference_number, $stop_id)
    {
        $stop = DispatchStop::find($stop_id);
        return view('dashboard.dispatch.stop', compact('stop'));
    }
}
