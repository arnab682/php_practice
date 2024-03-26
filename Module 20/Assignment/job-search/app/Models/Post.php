<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [ 'job_title', 'job_type', 'job_location', 'salary_range', 'published_on', 'vacancy', 'status', 'user_id'];

    public function Profile()
    {
        return $this->belongsTo('App\Models\Profile', 'user_id', 'user_id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

}
