<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'hire_date',
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
        return $this->first_name . ' ' . $this->last_name;
    }

    public function avatar()
    {
        return 'https://ui-avatars.com/api/?name=' . $this->first_name . '+' . $this->last_name . '.&background=5850ec&color=ffffff&font-size=0.4&size=64&length=2&bold=true&format=svg';
    }

    public function returnDashboardStats()
    {
        return collect([
            [
                'name' => 'This Week',
                'amount' => 1.00,
            ],
            [
                'name' => 'Last Week',
                'amount' => 1.00,
            ],
            [
                'name' => 'This Month',
                'amount' => 1.00,
            ],
            [
                'name' => 'This Year',
                'amount' => 102369.00,
            ],
        ]);
    }
}
