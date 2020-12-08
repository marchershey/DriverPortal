<?php

namespace App\Http\Controllers\Dashboard\Dispatch;

use App\Models\Dispatch;
use Livewire\Component;

class View extends Component
{
    public $title;
    public $dispatch;

    public $editReferenceNumber = false;
    public $editDate = false;
    public $editMiles = false;

    public $newReferenceNumber;
    public $newDate;
    public $newMiles;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($id)
    {
        $this->dispatch = Dispatch::find($id);
        $this->title = 'Dispatch #' . $this->dispatch->reference_number;

        $this->newReferenceNumber = $this->dispatch->reference_number;
        $this->newDate = $this->dispatch->date;
        $this->newMiles = $this->dispatch->miles;
    }

    public function render()
    {
        return view('web.dashboard.dispatch.view')->extends('layout.dashboard.dispatch.page', ['page_title' => $this->title])->section('dispatch-body');
    }

    public function save($what)
    {
        switch ($what) {
            case 'reference_number':
                $this->dispatch->reference_number = $this->newReferenceNumber;
                $this->editReferenceNumber = false;
                break;
            case 'date':
                $this->dispatch->date = $this->newDate;
                $this->editDate = false;
                break;
            case 'miles':
                $this->dispatch->miles = $this->newMiles;
                $this->editMiles = false;
                break;
        }

        $this->dispatch->save();
    }

}
