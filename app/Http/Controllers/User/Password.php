<?php

namespace App\Http\Controllers\User;

use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Password extends Component
{
    public $title = '';
    public $user;

    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('web.user.password')->extends('layout.user.app', ['page_title' => $this->title])->section('user-body');
    }

    public function submit()
    {
        $response = (new UpdateUserPassword)->update($this->user, [
            'current_password' => $this->currentPassword,
            'password' => $this->newPassword,
            'password_confirmation' => $this->confirmPassword,
        ]);

        if (!$response) {
            session()->flash('success', 'Your password has been updated.');
        } else {
            session()->flash('error', 'Something went wrong. Try again later');
        }

    }
}
