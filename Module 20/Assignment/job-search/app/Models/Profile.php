<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = [ 'mobile', 'date_of_birth', 'address', 'short_description', 'portfolio', 'status'];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
