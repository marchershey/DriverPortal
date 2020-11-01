<?php

namespace App\Http\Controllers\Dashboard\Dispatch;

use App\Models\Dispatch;
use App\Models\DispatchStatus;
use App\Rules\Dispatch\ReferenceNumber\UniqueReferenceNumber;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewDispatch extends Component
{
    public $dispatch;
    public $user;
    public $pageTitle;

    public $statuses;

    public $reference_number;
    public $estimated_miles;
    public $dispatch_date;
    public $status_id;

    public $status_name;
    public $status_bg;
    public $status_color;

    protected function rules()
    {
        return [
            'reference_number' => ['required', 'alpha_dash', new UniqueReferenceNumber],
            'estimated_miles' => 'required|numeric',
            'dispatch_date' => 'required|date',
            'status_id' => 'required',
        ];
    }

    public function mount($id)
    {
        $this->dispatch = Dispatch::find($id);
        $this->user = Auth::user();

        $this->statuses = DispatchStatus::all();

        $this->reference_number = $this->dispatch->reference_number;
        $this->estimated_miles = $this->dispatch->estimated_miles;
        $this->dispatch_date = $this->dispatch->dispatch_date;
        $this->status_id = $this->dispatch->status_id;

        $this->status_name = $this->dispatch->status->name;
        $this->status_bg = $this->dispatch->status->bg_color;
        $this->status_color = $this->dispatch->status->text_color;
    }

    public function status($value)
    {
        dd($value);
    }

    public function render()
    {
        if ($this->dispatch->user_id != $this->user->id) {
            return redirect()->to('dashboard.index');
        } else {
            return view('dashboard.dispatch.view-dispatch')->extends('inc.layouts.dashboard', ['user' => $this->user, 'pageTitle' => $this->pageTitle])->section('dashboard-content');
        }
    }

    public function updated($input, $value)
    {
        $this->validateOnly($input);

        $this->dispatch->$input = $value;
        $this->dispatch->save();

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'text' => 'Successfully updated.']);
    }

    public function updatedStatusId($value)
    {
        $status = DispatchStatus::find($value);

        $this->status_name = $status->name;
        $this->status_bg = $status->bg_color;
        $this->status_color = $status->text_color;
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

    public function complete()
    {
        $stops_index = $this->dispatch->stopsNeedData();

        if ($stops_index) {
            foreach ($stops_index as $index) {
                $this->addError('stop_' . $index, 'error');
            }
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'text' => 'Looks like one (or more) of the stops on this dispatch is missing data.', 'title' => 'Stops missing data!']);
        } else {
            $this->dispatch->status_id = 2;
            $this->dispatch->save();

            $this->dispatch = Dispatch::find($this->dispatch->id);

            $this->status_name = $this->dispatch->status->name;
            $this->status_bg = $this->dispatch->status->bg_color;
            $this->status_color = $this->dispatch->status->text_color;

            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'text' => 'This dispatch has been successfully created.', 'title' => 'Dispatch Created!']);
        }
    }

    public function delete()
    {
        $this->dispatch->deleted = 1;
        $this->dispatch->save();

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'text' => 'Redirecting...', 'title' => 'Successfully deleted!']);
        $this->dispatchBrowserEvent('redirect', ['delay' => 2500, 'location' => '/dashboard']);

    }
}
