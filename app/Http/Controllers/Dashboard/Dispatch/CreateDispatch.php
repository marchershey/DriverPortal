<?php

namespace App\Http\Controllers\Dashboard\Dispatch;

use App\Models\Dispatch;
use App\Models\DispatchStop;
use App\Models\Warehouse;
use App\Rules\Dispatch\ReferenceNumber\UniqueReferenceNumber;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateDispatch extends Component
{
    public $user;
    public $pageTitle;

    public $reference_number;
    public $estimated_miles;
    public $dispatch_date;
    public $equipment_tracking;

    public $warehouses = [];
    public $stops = [];

    public $truck_number;
    public $trailer_number;

    public $validator;

    protected function rules()
    {
        return [
            'reference_number' => ['required', 'alpha_dash', new UniqueReferenceNumber],
            'estimated_miles' => 'required|numeric',
            'dispatch_date' => 'required|date',
            'stops.*' => 'required|array',
            'stops.*.warehouse' => 'required|distinct|exists:warehouses,id',
        ];
    }

    protected $messages = [
        'reference_number.alpha_dash' => 'The reference number may only contain letters, numbers, dashes and underscores. (no spaces)',
        'reference_number.unique' => 'This reference number is already in use. Please choose another one.',
        'estimated_miles.numeric' => 'Estimated miles must be an integer (number).',
        'stops.*.warehouse.required' => 'You must select a warehouse or delete the stop.',
        'stops.*.warehouse.distinct' => 'You can not have duplicate stops.',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->pageTitle = "Create Dispatch";

        $this->dispatch_date = date('Y-m-d');

        $this->warehouses = (new Warehouse)->returnAllActive();
        $this->stops = [
            ['warehouse_id' => ''],
        ];

    }

    public function render()
    {
        return view('dashboard.dispatch.create')->extends('inc.layouts.dashboard', ['user' => $this->user, 'pageTitle' => $this->pageTitle])->section('dashboard-content');
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
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'text' => 'You need to have at least one stop.']);
        }

        $this->dispatchBrowserEvent('alert', ['type' => 'info', 'text' => 'Deleted <strong>Stop #' . $index . '</strong>', 'time' => 2000]);
    }

    public function submit()
    {
        $this->validate();

        $dispatch = Dispatch::create([
            'reference_number' => $this->reference_number,
            'estimated_miles' => $this->estimated_miles,
            'dispatch_date' => $this->dispatch_date,
            'status_id' => 1,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($this->stops as $stop) {
            $stop = DispatchStop::create([
                'dispatch_id' => $dispatch->id,
                'warehouse_id' => $stop['warehouse'],
            ]);
        }

        return redirect('/dashboard/dispatch/' . $dispatch->id);

    }

    public function dehydrate()
    {
        $errors = $this->getErrorBag();

        if (count($errors) > 0) {
            foreach ($errors->all() as $error) {
                $this->dispatchBrowserEvent('alert', ['type' => 'error', 'text' => $error, 'title' => 'Uh oh..']);
            }
        }

        $this->resetErrorBag();

    }
}
