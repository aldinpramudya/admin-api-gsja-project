<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $fillable = [
        "tags_name",
        "slugs",
    ];

    public function articles(){
        return $this->belongsToMany(Article::class)->withTimestamps();
    }

    public function getArticlesCountAttribute(){
        return $this->articles()->count();
    }

}
