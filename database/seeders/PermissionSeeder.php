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

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            'view-departments', 'manage-departments', 'view-roles', 'manage-roles', 'view-permissions', 'manage-permissions',
            'view-notices', 'manage-notices', 'view-attendances', 'view-attendances-history', 'manage-attendances', 'view-employees', 'manage-employees',
            'view-salaries', 'manage-salaries', 'view-leaves', 'manage-leaves', 'view-leave-requests', 'manage-leave-requests', 'view-leave-requests-history',
            'view-analytics', 'manage-roles-permissions'

        ];



        foreach ($permissions as $permission) {
            Permission::create([
                'permission' => $permission,
            ]);
        }
    }
}
