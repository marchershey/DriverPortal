<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Account extends Component
{
    public $title = '';

    public $user;
    public $first_name = ' ';
    public $last_name = ' ';
    public $email = ' ';
    public $hire_date;

    protected function rules()
    {
        return [
            'first_name' => ['required', 'alpha'],
            'last_name' => ['required'],
            'email' => ['required', 'email:dns'],
        ];
    }

    protected $messages = [
        // 'name.alpha' => 'Names may only contain letters, numbers, dashes and underscores.',
        // 'name.max' => 'That name is too long.',
        // 'last_name.alpha_dash' => 'Names may only contain letters, numbers, dashes and underscores.',
        // 'last_name.max' => 'That name is too long.',
    ];

    public function render()
    {
        return view('web.user.account')->extends('layout.user.app', ['page_title' => $this->title])->section('user-body');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->hire_date = date('Y-m-d');
    }

    public function updated($field, $value)
    {
        $this->validateOnly($field);
    }

    public function loadUserData()
    {
        sleep(1);
        $this->user = Auth::user();
        $this->first_name = ucfirst($this->user->first_name);
        $this->last_name = ucfirst($this->user->last_name);
        $this->email = $this->user->email;
        $this->hire_date = $this->user->hire_date;

    }

    public function deactivate()
    {
        $this->user->delete();
        request()->session()->flash(
            'success',
            'Your account was successfully deactivated.'
        );
        return redirect()->route('login');

        // return redirect('login')->with('status', 'Profile updated!');
    }

}
