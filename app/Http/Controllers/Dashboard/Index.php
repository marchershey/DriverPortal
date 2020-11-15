<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dispatch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $title = "Dashboard";
    public $dispatches = [];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('web.dashboard.index')->extends('layout.dashboard.app', ['page_title' => $this->title])->section('dashboard-body');
    }

    public function loadDispatches()
    {
        $this->dispatches = Dispatch::all();
    }
}
