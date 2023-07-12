<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'department-create', 'department-view', 'department-edit', 'department-delete',
            'employee-create', 'employee-view', 'employee-edit', 'employee-delete',
            'task-create', 'task-view', 'task-edit', 'task-delete',
        ];

        foreach ($data as $permission) {

            Permission::create([
                'permission' => $permission
            ]);
        }
    }
}
