<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function Profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'id');
    }

    public function Company()
    {
        return $this->hasOne('App\Models\Company', 'user_id', 'id');
    }

    public function Role()
    {
        return $this->hasOne('App\Models\Role', 'user_id', 'id');
    }

    public function social_accounts()
    {
        return $this->hasOne('App\Models\SocialAccount', 'user_id', 'id');
    }
}
