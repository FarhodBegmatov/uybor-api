<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superadministrator',
            'description' => 'Can do everything!'
        ]);

        Role::create([
            'name' => 'accountant',
            'description' => 'Can create and update!'
        ]);

        Role::create([
            'name' => 'sales-manager',
            'description' => 'Can only get data!'
        ]);
    }
}
