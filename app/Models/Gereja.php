<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gereja extends Model
{
    protected $table = "gerejas";
    protected $fillable = [
        "pendeta_id",
        "name_gereja",
        "image_gereja",
        "address_gereja",
        "numberphone_gereja",
        "email_gereja",
    ];
}
