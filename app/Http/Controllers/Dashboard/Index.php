<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $title = "Dashboard";

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('web.dashboard.index')->extends('layout.dashboard.app', ['page_title' => $this->title])->section('dashboard-body');
    }
}
