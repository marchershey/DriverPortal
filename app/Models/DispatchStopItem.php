<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispatchStopItem extends Model
{
    use HasFactory;

    protected $fillable = ['dispatch_stop_id', 'billable_item_id', 'quantity'];

    public function billable_items()
    {
        return $this->belongsTo(DispatchBillableItem::class, 'billable_item_id');
    }
}
