<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketProfile extends Model
{
    protected $fillable = [
        'name',
        'price'
    ];
}
