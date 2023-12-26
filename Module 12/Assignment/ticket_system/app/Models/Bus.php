<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'buses';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
                            'bus_number',
                            'bus_seats',
                            'remark',
                            'status',
                        ];

   protected $attributes = array(
                            'bus_number' => 'S.Alam',
                            'bus_seats' => 36,
                            'remark' => 'Running',
                            'status' => 1,
                            'created_by' => 1,
                            'updated_by' => 1,
                        );
}
