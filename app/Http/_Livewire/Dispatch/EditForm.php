<?php

namespace App\Http\Components\Dispatch;

use App\Models\Dispatch;
use Livewire\Component;

class EditForm extends Component
{
    public $dispatch;

    public $reference_number;
    public $estimated_miles;
    public $starting_date;

    public $warehouses = [];
    public $stops = [];

    protected $rules = [
        // 'reference_number' => 'required|alpha_num|unique:dispatches,reference_number,'.$this->reference_number,
        'estimated_miles' => 'required|numeric',
        'starting_date' => 'required|date',
    ];

    public function mount($dispatch)
    {
        $this->reference_number = $dispatch->reference_number;
        $this->estimated_miles = $dispatch->estimated_miles;
        $this->starting_date = $dispatch->starting_date;
    }

    public function render()
    {
        return view('inc.components.dispatch.edit-form');
    }

    public function updated($field, $newValue)
    {
        $this->validateOnly($field);
    }

    public function update()
    {
        $this->validate();

        $this->dispatch->reference_number = $this->reference_number;
        $this->dispatch->estimated_miles = $this->estimated_miles;
        $this->dispatch->starting_date = $this->starting_date;
        $this->dispatch->save();

        session()->flash('success', 'Saved successfully!');
    }
}
