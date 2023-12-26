<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
                            'name',
                            'email',
                            'phone_number',
                            'address',
                            'status',
                        ];

   protected $attributes = array(
                            'name' => 'Arnab',
                            'phone_number' => '123',
                            'email' => 'd@gmail.com',
                            'status' => 1,
                            'address' => 'ctg',
                        );

}
