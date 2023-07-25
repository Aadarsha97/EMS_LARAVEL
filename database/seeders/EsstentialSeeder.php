<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class EsstentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $routes = Route::getRoutes();

        $data = array_keys($routes->getRoutesByName());


        foreach ($data as $permission) {

            Permission::create([
                'permission' => $permission
            ]);
        }
    }
}
