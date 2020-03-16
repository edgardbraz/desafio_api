<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'name',
        'buyer_id',
        'event_id',
        'status_id',
        'datetime_begin',
        'datetime_confirm',
        'datetime_cancel',
    ];
}
