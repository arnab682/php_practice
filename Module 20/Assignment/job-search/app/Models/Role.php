<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['superadmin', 'company', 'candidate'];
     public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
