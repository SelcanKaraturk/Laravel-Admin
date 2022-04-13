<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot(){
        parent::boot();
        static::creating(function ($post){
            if (is_null($post->user_id)){
               $post->user_id = auth()->user()->id;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }
    public function getPublishedAttribute($query)
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }
}
