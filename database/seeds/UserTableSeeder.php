<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++){
            $user = User::create([
                'name' => 'Test '.$i,
                'email' => 'test'.$i.'@test.com',
                'isAdmin' => 0,
                'email_verified_at' => now(),
                'password' =>Hash::make('password'), // password
                'remember_token' => Str::random(10),
            ]);

            $role = Role::where('id', 5)->first();
            $user->syncRoles($role);
        }
    }
}
