<?php

namespace App\Http\Components\Dispatch;

use App\Models\DispatchBillableItem;
use App\Models\DispatchStopItem;
use Livewire\Component;

class StopForm extends Component
{
    public $stop;
    public $billable_items = [];
    public $stop_items = [];

    protected $rules = [
        'stop_items.*.billable_item_id' => 'required|distinct',
        'stop_items.*.quantity' => 'required',
    ];
    protected $messages = [
        'stop_items.*.billable_item_id.required' => 'Please select an item or delete the row.',
        'stop_items.*.billable_item_id.distinct' => 'You can not have duplicates items.',
        'stop_items.*.quantity.required' => 'You\'re missing the quantity.',
    ];

    public function mount($stop)
    {
        $this->stop = $stop;
        $this->billable_items = DispatchBillableItem::all();
        $this->stop_items = collect($stop->items)->toArray();
    }

    public function render()
    {
        return view('inc.components.dispatch.stop-form');
    }

    public function updated($field, $newValue)
    {
        $this->validateOnly($field);
    }

    public function addStopItem()
    {
        $this->stop_items[] = [];
    }

    public function removeStopItem($index)
    {

        $this->validateOnly('stops');
        unset($this->stop_items[$index]);
        array_values($this->stop_items);
    }

    public function submit()
    {
        $this->validate();

        $this->stop->items()->delete();

        foreach ($this->stop_items as $item) {
            DispatchStopItem::create([
                'dispatch_stop_id' => $this->stop->id,
                'billable_item_id' => $item['billable_item_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->flash('success', 'Saved successfully!');

    }
}
