<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = [
        "name",
        "display_name",
        "description",
    ];

    const SUPERADMIN = 'superadmin';
    const ADMIN = 'admin';
    const BENDAHARA = 'bendahara';
    const PENDETA = 'pendeta';

    // Relationships
    public function users(){
        return $this->hasMany(User::class);
    }

    // Helper Methods
    public static function getSuperAdmin(){
        return self::where('name', self::SUPERADMIN)->first();
    }

    public static function getAdmin(){
        return self::where('name', self::ADMIN)->first();
    }

    public static function getBendahara(){
        return self::where('name', self::BENDAHARA)->first();
    }

    public static function getPendeta(){
        return self::where('name', self::PENDETA)->first();
    }
}
