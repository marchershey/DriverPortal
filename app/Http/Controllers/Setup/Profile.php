<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $first_name;
    public $last_name;
    public $hire_date;

    protected $rules = [
        'first_name' => 'required|string|alpha_dash|max:250',
        'last_name' => 'required|string|alpha_dash|max:250',
        'hire_date' => 'required|date|date_format:Y-m-d|alpha_dash|max:10',
    ];

    protected $messages = [
        'first_name.required' => 'Your first name is required.',
        'first_name.string' => 'Invalid first name.',
        'first_name.alpha' => 'Your first name can only contain A-Z characters.',
        'first_name.max' => 'Your first name is too long.',
        'last_name.required' => 'Your last name is required.',
        'last_name.string' => 'Invalid last name.',
        'last_name.alpha' => 'Your last name can only contain A-Z characters.',
        'last_name.max' => 'Your last name is too long.',
    ];

    public function mount()
    {
        $this->hire_date = date('Y-m-d');
    }

    public function render()
    {
        return view('frontend.setup.profile.form');
    }

    public function updated($field, $newValue)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->first_name = ucfirst(trim($this->first_name));
        $user->last_name = ucfirst(trim($this->last_name));
        $user->hire_date = $this->hire_date;
        $user->setup_completed = 1;
        $user->save();

        return redirect()->route('dashboard.index');

    }
}
