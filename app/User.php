<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'role' => 'customer',
        'active' => 1,
    ];
    /**
     * Added soft delete to the deleted_at field
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function scopeCustomer($query)
    {
        return $query->where('role', 'customer');//->whereNull('deleted_at');
    }

    public function scopeActive($query)
    {
        return $query->where('role', 'customer')->where('active', 1);
    }

    public function scopePaid($query)
    {
        //return $query->where('role', 'customer')->whereNotNull('charge_id');
    }

    public function charges()
    {
        return $this->hasMany(Charges::class);
    }
}
