<?php

namespace App\Http\Controllers\Dashboard\Dispatch;

use App\Models\Dispatch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $title = 'Create a new dispatch';
    public $user;
    public $reference_number;
    public $date;
    public $miles;

    public function rules()
    {
        return [
            'reference_number' => ['required', 'numeric'],
            'date' => ['required', 'date', 'date_format:Y-m-d'],
            'miles' => ['required', 'numeric', 'max:999'],
        ];
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        return view('web.dashboard.dispatch.create')->extends('layout.dashboard.dispatch.app', ['page_title' => $this->title])->section('dispatch-body');
    }

    public function updated($field, $value)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        $dispatch = new Dispatch;
        $dispatch->reference_number = $this->reference_number;
        $dispatch->date = $this->date;
        $dispatch->miles = $this->miles;
        $dispatch->status_id = 1;
        $dispatch->user_id = $this->user->id;
        if ($dispatch->save()) {
            return redirect()->route('dashboard.dispatch.view', ['id' => $dispatch->id]);
        } else {
            session()->flash('error', 'Something wen\'t wrong.. try again.');
        }

    }
}
