<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosisiPanitia extends Model
{
    protected $table = "posisi_panitia";
    protected $fillable = [
        'name_position'
    ];

    public function panitias(){
        return $this->hasMany(SusunanPanitia::class, 'name_position_id');
    }
}
