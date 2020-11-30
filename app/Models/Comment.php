<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'post_id'
    ];    

    protected $hidden=['user', 'post'];

    protected $appends=['user_name','post_title'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    public function getPostTitleAttribute()
    {
        return $this->post->title;
    }
}


