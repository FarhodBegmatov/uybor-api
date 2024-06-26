<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
//         $this->call(RoleSeederTable::class);
//         $this->call(PermissionSeederTable::class);
         $this->call([
             RolesAndPermissionsSeeder::class,
         ]);
    }
}
