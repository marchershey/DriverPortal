<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public function returnAllActive()
    {
        return $this->where('active', 1)->orderBy('name')->get();
    }
}
