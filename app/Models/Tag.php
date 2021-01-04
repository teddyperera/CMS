<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    // Eloquent events

    public static function boot(){
        parent::boot();

        //When tag is deleting, detach post_tag relationshipm from pivot table
        static::deleting(function ($tag){
            $tag->posts()->detach();
        });
    }
}
