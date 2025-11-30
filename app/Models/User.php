<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationship
    public function role(){
        return $this->belongsTo(Role::class);
    }

    // Role Check
    public function hasRole($roleName){
        return $this->role && $this->role->name === $roleName;
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            return $this->hasRole($roles);
        }
        return false;
    }

    public function isSuperAdmin(){
        return $this->hasRole(Role::SUPERADMIN);
    }

    public function isAdmin(){
        return $this->hasRole(Role::ADMIN);
    }

    public function isBendahara(){
        return $this->hasRole(Role::BENDAHARA);
    }

    public function isPendeta(){
        return $this->hasRole(Role::PENDETA);
    }

    // Get Role Display Name
    public function getRoleNameAttribute(){
        return $this->role ? $this->role->display_name : 'No Role';
    }
}
