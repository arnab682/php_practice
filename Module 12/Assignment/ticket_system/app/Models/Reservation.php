<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

     protected $table = 'reservations';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
                            'customer_id',
                            'bus_id',
                            'location',
                            'destination',
                            'reservation_date',
                            'reservation_time',
                            'status',
                        ];

    protected $attributes = array(
                            'customer_id' => 5,
                            'bus_id' => 1,
                            'location' => 'Dhake',
                            'destination' => 'Coxs Bazaar',
                            'reservation_date' => '12/1/2024',
                            'reservation_time' => '6.00am',
                            'tickets' => 1,
                            'status' => 1,
                            'created_by' => 1,
                            'updated_by' => 1,
                        );
}
