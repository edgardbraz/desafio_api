<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'owner_id',
        'datetime_begin',
        'datetime_end',
        'status_id',
        'category_id',
        'state',
        'city',
        'street',
        'number'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
}
