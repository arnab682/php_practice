<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $table = 'social_links';
    protected $fillable = [ 'twitter', 'facebook', 'youtube', 'linkedin', 'status', 'user_id', 'created_by', 'updated_by'];

}
