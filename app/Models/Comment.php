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

    /**
     * IF Eager loading user and post remove this hidden attribute
     */
    protected $hidden=['user', 'post'];

    /**
     * Appends user_name and post_title with every comment
     * 
     * @uses getUserNameAttribute
     * @uses getPostTitleAttribute
     */
    protected $appends=['user_name','post_title'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    /**
     * Getting the username for this comment
     * 
     * @return mix
     */
    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    /**
     * Getting the post title for this comment
     * 
     * @return mix
     */
    public function getPostTitleAttribute()
    {
        return $this->post->title;
    }
}


