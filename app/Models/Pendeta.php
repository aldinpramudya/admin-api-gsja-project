<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendeta extends Model
{
    protected $table = "pendetas";
    protected $fillable = [
        "name_pendeta",
        "image_pendeta",
        "salary",
    ];

    public function gereja(){
        return $this->hasOne(Gereja::class, 'pendeta_id');
    }

}
