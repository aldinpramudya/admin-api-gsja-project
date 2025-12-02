<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SusunanPanitia extends Model
{
    protected $table = "susunan_panitia";
    protected $fillable = [
        'name_position_id',
        "name_panitia",
        "image_panitia"
    ];

    public function posisiPanitia(){
        return $this->belongsTo(PosisiPanitia::class, 'name_position_id', 'id');
    }
}
