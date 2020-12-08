<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'billing_items';

    protected $guarded = [];

    // public function stop()
    // {
    //     return $this->hasOne(DispatchStop::class);
    // }
}
