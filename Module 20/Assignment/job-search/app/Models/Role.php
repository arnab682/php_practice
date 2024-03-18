<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['superadmin', 'company', 'candidate', 'user_id'];
     public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
