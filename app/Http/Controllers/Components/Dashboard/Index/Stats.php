<?php

namespace App\Http\Controllers\Components\Dashboard\Index;

use Livewire\Component;

class Stats extends Component
{
    public $user;
    public $stats = [];

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('components.dashboard.index.stats');
    }

    public function loadStats()
    {
        // sleep(3);
        $this->stats = $this->user->returnDashboardStats();
    }
}
