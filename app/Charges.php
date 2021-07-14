<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charges extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'charge_id'
    ];

    protected $table = 'charges';

}
