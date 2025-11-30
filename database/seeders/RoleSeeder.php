<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDO;

class RoleSeeder extends Seeder
{
    /**
     * Run This Seeder with php artisan db:seed --class=RoleSeeder
     */
    public function run(): void
    {
        $roles = [ 
            [
                'name' => 'superadmin',
                'display_name' => 'SuperAdmin',
                'description' => 'Dapat melakukan penambahan, pengurangan, pengeditan terhadap seluruh fitur yang ada dan menambahkan users',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Dapat Penambahan, pengurangan, dan pengeditan terhadap konten'
            ],
            [
                'name' => 'bendahara',
                'display_name' => 'Bendahara',
                'description' => 'Dapat melakukan perubahan data terhadap gaji pendeta',
            ],
            [
                'name' => 'pendeta',
                'display_name' => 'Pendeta',
                'description' => 'Dapat mengakses informasi yang mengenai data diri'
            ]
        ];

        foreach($roles as $role){
            Role::create($role);
        }
    }
}
