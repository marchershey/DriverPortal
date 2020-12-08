<?php

namespace App\Http\Controllers\Components\Dashboard\Index;

use App\Models\Dispatch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dispatches extends Component
{
    use WithPagination;

    public $dispatches = [];

    public $count = 5;
    public $hasMore = true;

    public function render()
    {
        return view('components.dashboard.index.dispatches');
    }

    public function loadDispatches()
    {
        $this->dispatches = Dispatch::orderBy('status_id')->orderBy('date', 'desc')->limit($this->count)->get();
        if ($this->count >= count(Dispatch::where('user_id', Auth::user()->id)->get())) {
            $this->hasMore = false;
        }
    }

    public function loadMore()
    {
        $this->count = $this->count + 5;
        $this->loadDispatches();
    }
}
