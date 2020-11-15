<?php

namespace App\Http\Controllers\User;

use Livewire\Component;

class Notifications extends Component
{
    public $title = '';

    public function render()
    {
        return view('web.user.notifications')->extends('layout.user.app', ['page_title' => $this->title])->section('user-body');
    }
}
