<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    protected $fillable = ['user_id', 'path', 'ip_address', 'created_at'];
}
