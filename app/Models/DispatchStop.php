<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class DispatchStop extends Pivot
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'dispatch_stops';

    public function dispatch()
    {
        return $this->belongsTo(Dispatch::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function billingItems()
    {
        // return $this->belongsToMany(BillingItem::class, 'dispatch_stop_billing_items', 'stop_id', 'billing_item_id')->withPivot('quantity');
        return $this->belongsToMany(BillingItem::class, 'dispatch_stop_billing_items', 'stop_id', 'billing_item_id')->withPivot('quantity');
    }
}
