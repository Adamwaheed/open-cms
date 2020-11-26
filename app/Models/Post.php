<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'body', 'slug', 'status', 'user_id', 'type'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    
    }  
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
