<?php

namespace App\Http\Controllers\Components\Dashboard\Dispatch\View;

use App\Models\BillingItem;
use App\Models\Dispatch;
use App\Models\DispatchStop;
use App\Models\Warehouse;
use Livewire\Component;

class StopsList extends Component
{
    public $dispatch;
    public $stops;
    public $warehouses;
    public $billingItems;

    public $addStopModal = false;
    public $viewStopModal = false;

    public $newStop;
    public $selectedStop;
    public $selectedStopBillingItems;

    protected $rules = [
        'selectedStopBillingItems.*.id' => ['distinct'],
    ];

    protected $messages = [
        'selectedStopBillingItems.*.id.distinct' => 'You can not have duplicate Billing Items',
    ];

    public function mount($dispatch)
    {
        $this->dispatch = $dispatch;
        $this->warehouses = Warehouse::all();
        $this->billingItems = BillingItem::all()->toArray();
    }

    public function render()
    {
        return view('components.dashboard.dispatch.view.stops-list');
    }

    public function loadStops()
    {
        $stops = $this->dispatch->stops;

        if ($stops->isNotEmpty()) {
            $this->stops = $stops;
        } else {
            $this->stops = null;
        }

    }

    /**
     * Add Stop
     */

    public function openAddStopModal()
    {
        $this->resetAddStopModal();
        $this->addStopModal = true;
    }

    public function closeAddStopModal()
    {
        $this->addStopModal = false;
    }

    public function resetAddStopModal()
    {
        $this->newStop = [];
    }

    public function saveStop()
    {
        $this->dispatch->stops()->save(new DispatchStop([
            'dispatch_id' => $this->dispatch->id,
            'warehouse_id' => $this->newStop['warehouse'],
        ]));
        $this->dispatch->refresh();
        $this->closeAddStopModal();
        $this->loadStops();
    }

    /**
     * View Stop
     */

    public function viewStop($index)
    {
        $stopId = $this->dispatch->stops[$index]->id;

        $this->selectedStop = DispatchStop::find($stopId);
        $this->selectedStop->refresh();

        $this->loadBillingItems();
        $this->openViewStopModal();
    }

    // public function removeStop()
    // {
    //     $this->dispatch->
    // }

    public function openViewStopModal()
    {
        $this->viewStopModal = true;
    }

    public function hideViewStopModal()
    {
        $this->viewStopModal = false;
    }

    public function addBillingItem()
    {
        $this->selectedStopBillingItems[] = [
            'id' => 0,
            'quantity' => '1',
        ];
    }

    public function removeBillingItem($index)
    {
        unset($this->selectedStopBillingItems[$index]);
    }

    public function loadBillingItems()
    {
        $this->selectedStop->refresh()->orderBy('id');
        $this->selectedStopBillingItems = [];

        foreach ($this->selectedStop->billingItems as $item) {
            $this->selectedStopBillingItems[] = [
                'id' => $item->id,
                'quantity' => $item->pivot->quantity,
            ];
        }
    }

    public function saveBillingItems()
    {
        $items = [];
        foreach ($this->selectedStopBillingItems as $item) {
            $items[$item['id']] = [
                'quantity' => $item['quantity'],
            ];
        }
        $this->selectedStop->billingItems()->sync($items);
        $this->loadBillingItems();
        $this->hideViewStopModal();
    }
}
