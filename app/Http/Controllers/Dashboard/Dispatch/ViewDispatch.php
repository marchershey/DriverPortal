<?php

namespace App\Http\Controllers\Dashboard\Dispatch;

use App\Models\Dispatch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewDispatch extends Component
{
    public $dispatch;
    public $user;
    public $pageTitle;

    public function mount($ref)
    {
        $this->dispatch = Dispatch::where('reference_number', $ref)->firstOrFail();
        $this->user = Auth::user();
        $this->pageTitle = "Dispatch #" . $this->dispatch->reference_number;
    }

    public function render()
    {
        if ($this->dispatch->user_id != $this->user->id) {
            return redirect()->to('dashboard.index');
        } else {
            return view('dashboard.dispatch.view-dispatch')->extends('inc.layouts.dashboard', ['user' => $this->user, 'pageTitle' => $this->pageTitle])->section('dashboard-content');
        }
    }
}
