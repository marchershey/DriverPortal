<?php

namespace App\Http\Components\Dispatch;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewForm extends Component
{
    public $dispatch;
    public $rates;

    public $reference_number;
    public $estimated_miles;
    public $starting_date;

    public $stops = [];

    protected $rules = [
    ];

    public function mount($dispatch)
    {
        $this->rates = Auth::user()->rates();

        $this->reference_number = $dispatch->reference_number;
        $this->estimated_miles = $dispatch->estimated_miles;
        $this->starting_date = $dispatch->starting_date;

        $this->stops = $dispatch->stops;
    }

    public function render()
    {
        return view('inc.components.dispatch.view-form');
    }

    public function addBillableItem($stop_index)
    {
        $this->stops[$stop_index]['item'][] = [];
    }
}
