<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispatch extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_number',
        'miles',
        'date',
        'status_id',
        'user_id',

    ];

    public function status()
    {
        return $this->belongsTo(DispatchStatus::class);
    }

    public function stops()
    {
        return $this->belongsToMany(Warehouse::class, 'dispatch_stops');
    }

    public function returnDispatches()
    {
        return $this->all();
    }
}
