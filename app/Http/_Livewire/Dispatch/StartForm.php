<?php

namespace App\Http\Components\Dispatch;

use App\Models\Dispatch;
use App\Models\DispatchStop;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StartForm extends Component
{
    public $reference_number;
    public $estimated_miles;
    public $starting_date;
    public $status_id;

    public $warehouses = [];
    public $stops = [];

    protected $rules = [
        'reference_number' => 'required|alpha_num|unique:dispatches,reference_number',
        'estimated_miles' => 'required|numeric',
        'starting_date' => 'required|date',
        'stops.*' => 'required|array',
        'stops.*.warehouse' => 'required|distinct|exists:warehouses,id',
    ];

    protected $messages = [
        'stops.*.warehouse.required' => 'You must select a warehouse or delete the stop.',
        'stops.*.warehouse.distinct' => 'These stops are duplicate.',
    ];

    public function mount()
    {
        $this->starting_date = date('Y-m-d');
        $this->status_id = 0;
        $this->warehouses = (new Warehouse())->returnAllActive();
        $this->stops = [
            ['warehouse_id' => ''],
        ];
    }

    public function render()
    {
        return view('inc.components.dispatch.start-form');
    }

    public function updated($field, $newValue)
    {
        $this->validateOnly($field);
    }

    public function addStop()
    {
        $this->stops[] = [];
    }

    public function removeStop($index)
    {
        $this->validateOnly('stops');
        if (count($this->stops) > 1) {
            unset($this->stops[$index]);
            $this->stops = array_values($this->stops);
        } else {
            session()->flash('warning', 'You need to have at least 1 stop.');
        }
    }

    public function submit()
    {
        $this->validate();

        $dispatch = Dispatch::create([
            'reference_number' => $this->reference_number,
            'estimated_miles' => $this->estimated_miles,
            'starting_date' => $this->starting_date,
            'status_id' => $this->status_id,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($this->stops as $stop) {
            $stop = DispatchStop::create([
                'dispatch_id' => $dispatch->id,
                'warehouse_id' => $stop['warehouse'],
            ]);
        }

        return redirect('/dispatch/' . $dispatch->reference_number);
    }
}
