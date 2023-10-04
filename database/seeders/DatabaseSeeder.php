<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
        /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::find(2)->givePermissionTo(['create order']);
        // $this->call([ProvinceSeeder::class]);
        // User::create( [
        //     'name' =>'daftar moqam',
        //     'email' =>'moqam@gmail.com',
        //     'email_verified_at' => now(),
        //     'department_id' => 1,
        //     'password' =>Hash::make("password")

        // ]);

      //   User::create( [
      //     'name' =>'mali ',
      //     'email' =>'mali@gmail.com',
      //     'email_verified_at' => now(),
      //     'department_id' => 2,
      //     'password' =>Hash::make("password")

      // ]);
          // $this->call(RolesSeeder::class);
        //  $this->call(PermissionsSeeder::class);
    }
}
