<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = ['name', 'year_of_establishment', 'company_size',
                        'address', 'company_type', 'url', 'short_description',
                        'license_no', 'number', 'email', 'password', 'status'];
}
