<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create order']);
        // Permission::create(['name' => 'search order']);
        // Permission::create(['name' => 'create reported_fault']);
        // Permission::create(['name' => 'delete reported_fault']);
        // Permission::create(['name' => 'create correcting_actions']);
        // Permission::create(['name' => 'delete correcting_actions']);
        // Permission::create(['name' => 'update order']);
        // Permission::create(['name' => 'create existing_items']);
        // Permission::create(['name' => 'delete existing_items']);
        // Permission::create(['name' => 'create parts_distribution']);
        // Permission::create(['name' => 'delete parts_distribution']);
        // Permission::create(['name' => 'print order']);
        // Permission::create(['name' => 'create qataa']);
        // Permission::create(['name' => 'update qataa']);
        // Permission::create(['name' => 'search qataa']);
        // Permission::create(['name' => 'create parts']);
        // Permission::create(['name' => 'update part']);
        // Permission::create(['name' => 'search part']);
        // Permission::create(['name' => 'print report']);
    }
}
