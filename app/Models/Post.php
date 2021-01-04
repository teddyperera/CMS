<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'published_at'
    ];

    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'
    ];

    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /**
     * check if post has tag
     * 
     * @return bool
     */
    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query){
        $search = request()->query('search');

        if(!$search){
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }

    public function scopePublished($query){
        return $query->Where('published_at', '<=', now());
    }
}
