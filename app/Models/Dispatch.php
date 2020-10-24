<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = ['reference_number', 'estimated_miles', 'dispatch_date', 'status_id', 'user_id'];

    public $grossPay = 0;

    public function stops()
    {
        return $this->hasMany(DispatchStop::class);
    }

    public function status()
    {
        return $this->hasOne(DispatchStatus::class);
    }

    public function grossPay()
    {
        // mileage
        $this->grossPay = $this->grossPay + ($this->estimated_miles * Auth::user()->rates()->mileage);
        // stop pay
        $this->grossPay = $this->grossPay + (($this->stops()->count() - 1) * Auth::user()->rates()->stop_pay);

        $rates = Auth::user()->rates();

        foreach ($this->stops as $stop) {
            foreach ($stop->items as $item) {
                $this->grossPay = $this->grossPay + ($rates[DispatchBillableItem::find($item->billable_item_id)->rate_code] * $item->quantity);
            }
        }

        return $this->grossPay;

    }
}
