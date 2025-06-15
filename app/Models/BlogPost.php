<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content_raw',
        'content_html',
        'is_published',
        'published_at',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
