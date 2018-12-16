<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'postal_code',
        'phone',
        'company_name',
    ];
}
