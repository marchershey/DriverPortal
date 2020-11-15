<?php

namespace App\Http\Controllers\Dashboard\Dispatch;

use App\Models\Dispatch;
use Livewire\Component;

class View extends Component
{
    public $title;

    public $dispatch;

    public function mount($id)
    {
        $this->dispatch = Dispatch::find($id);
        $this->title = 'Dispatch #' . $this->dispatch->reference_number;
    }

    public function render()
    {
        return view('web.dashboard.dispatch.view')->extends('layout.dashboard.dispatch.app', ['page_title' => $this->title])->section('dispatch-body');
    }
}
