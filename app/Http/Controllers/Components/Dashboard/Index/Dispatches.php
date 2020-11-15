<?php

namespace App\Http\Controllers\Components\Dashboard\Index;

use App\Models\Dispatch;
use Livewire\Component;

class Dispatches extends Component
{
    public $dispatches = [];

    public function render()
    {
        return view('components.dashboard.index.dispatches');
    }

    public function loadDispatches()
    {
        // sleep(4);
        $this->dispatches = Dispatch::all()->sortByDesc('date')->sortBy('status_id');
    }
}
