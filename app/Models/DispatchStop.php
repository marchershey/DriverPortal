<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DispatchStop extends Model
{
    use HasFactory;

    protected $fillable = ['dispatch_id', 'warehouse_id'];

    public $grossPay;

    public function dispatch()
    {
        return $this->belongsTo(Dispatch::class);
    }

    public function items()
    {
        return $this->hasMany(DispatchStopItem::class, 'dispatch_stop_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function grossPay()
    {
        $this->grossPay = 0;

        $rates = Auth::user()->rates();

        foreach ($this->items as $item) {
            $this->grossPay = $this->grossPay + ($rates[DispatchBillableItem::find($item->billable_item_id)->rate_code] * $item->quantity);
        }

        return $this->grossPay;
    }
}
