<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = [
        "article_title",
        "article_slug",
        "article_excerpt",
        "is_visible",
        "article_content",
        "article_image"
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}
