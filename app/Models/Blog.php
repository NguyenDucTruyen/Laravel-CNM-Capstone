<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'blogImage',
        'statusBlog'
    ];

    //set relationship many
    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'blog_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }

    //set relationship one
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
