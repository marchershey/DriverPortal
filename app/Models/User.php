<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullName()
    {
        return Auth::user()->first_name . ' ' . Auth::user()->last_name;
    }

    public function monthsEmployed()
    {

        $hire_date = Carbon::createFromFormat('Y-m-d', $this->hire_date);
        $today = Carbon::now();

        return $today->diffInMonths($hire_date);
    }

    public function rates()
    {
        return Rates::where('months', '>=', $this->monthsEmployed())->first();
    }

    public function dispatches()
    {
        return $this->hasMany(Dispatch::class);
    }
}
