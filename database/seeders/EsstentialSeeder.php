<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class EsstentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = [
            'role' => 'Admin',
            'level' => '1',

        ];

        $department = [
            'name' => 'Adminstration',

        ];

        Department::create($department);

        Role::create($role);



        $user = [
            'name' => 'Alex',
            'role_id' => 1,
            'department_id' => 1,
            'email' => 'alex@gmail.com',
            'password' => Hash::make('12345678'),

        ];

        User::create($user);
        //    
    }
}
