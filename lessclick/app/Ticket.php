<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'code',
        'sale_id',
        'status_id',
        'profile_id',
    ];
}
