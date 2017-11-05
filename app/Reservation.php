<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table ='reservations';
    protected $fillable = [
        'firstName', 'lastName', 'address','email','phone','checkIn','checkOut','single_price','days','room_type', 'the_price','created_at', 'updated_at',
    ];
}
