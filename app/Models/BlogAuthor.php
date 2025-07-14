<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAuthor extends Model
{
    use HasFactory;

    protected $table = 'blog_authors';

    protected $fillable = [
        'name',
        'role',
        'avatar',
        'bio',
        'twitter',
        'linkedin',
        'github',
    ];

    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'author_id');
    }
} 