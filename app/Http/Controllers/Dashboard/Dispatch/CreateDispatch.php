<?php

namespace App\Http\Controllers\Dashboard\Dispatch;

use App\Models\Warehouse;
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

    public $rules = [
        'reference_number' => 'required|alpha_num|unique:dispatches,reference_number',
        'estimated_miles' => 'required|numeric',
        'dispatch_date' => 'required|date',
        'stops.*' => 'required|array',
        'stops.*.warehouse' => 'required|distinct|exists:warehouses,id',
    ];

    protected $messages = [
        'stops.*.warehouse.required' => 'You must select a warehouse or delete the stop.',
        'stops.*.warehouse.distinct' => 'These stops are duplicate.',
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
        return view('dashboard.dispatch.create-dispatch')->extends('inc.layouts.dashboard', ['user' => $this->user, 'pageTitle' => $this->pageTitle])->section('dashboard-content');
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
    }

    public function submit()
    {

        // $this->dispatchBrowserEvent('alert', ['type' => 'success', 'text' => 'Redirecting...', 'title' => 'Dispatch created successfully!']);
        $this->validate();

    }

    public function hydrate()
    {
        dd('test');
        $errors = $this->getErrorBag();
        dd('asdf');

        if (count($errors) > 0) {
            dd($errors);
            foreach ($errors as $error) {
                // $this->dispatchBrowserEvent('alert', ['type' => 'success', 'text' => 'Redirecting...', 'title' => 'Dispatch created successfully!']);
            }
        }

    }
}
