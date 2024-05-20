<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'creator', 'votes_enable', 'votes_name1', 'votes_name2', 'votes_value1', 'votes_value2','likes_count', 'comments_count'];
}
