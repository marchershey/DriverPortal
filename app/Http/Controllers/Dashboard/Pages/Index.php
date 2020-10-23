<?php

namespace App\Http\Controllers\Dashboard\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $pageTitle;

    public function mount()
    {
        $this->user = Auth::user();
        $this->pageTitle = "Dashboard";
    }

    public function render()
    {
        return view('dashboard.pages.index')->extends('inc.layouts.dashboard', ['user' => $this->user, 'pageTitle' => $this->pageTitle])->section('dashboard-content');
    }
}
