<?php

use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //User Model
//        $userPermission1 = Permission::create(['name' => 'create:user', 'description' => 'create user']);
//        $userPermission2 = Permission::create(['name' => 'read: user', 'description' => 'read user']);
//        $userPermission3 = Permission::create(['name' => 'update: user', 'description' => 'update user']);
//        $userPermission4 = Permission::create(['name' => 'delete: user', 'description' => 'delete User']);

        //Permission Model
//        $permission1 = Permission::create(['name' => 'create: permission', 'description' => 'create permission']);
//        $permission2 = Permission::create(['name' => 'read: permission', 'description' => 'read permission']);
//        $permission3 = Permission::create(['name' => 'update: permission', 'description' => 'update permission']);
//        $permission4 = Permission::create(['name' => 'delete: permission', 'description' => 'delete permission']);

        //Role Model
        $rolePermission1 = Permission::create(['name' => 'create: role', 'description' => 'create role']);
        $rolePermission2 = Permission::create(['name' => 'read: role', 'description' => 'read role']);
        $rolePermission3 = Permission::create(['name' => 'update: role', 'description' => 'update role']);
        $rolePermission4 = Permission::create(['name' => 'delete: role', 'description' => 'delete role']);

        //House Model
        $housePermission1 = Permission::create(['name' => 'create: house', 'description' => 'create house']);
        $housePermission2 = Permission::create(['name' => 'read: house', 'description' => 'read house']);
        $housePermission3 = Permission::create(['name' => 'getById: house', 'description' => 'getById house']);
        $housePermission4 = Permission::create(['name' => 'update: house', 'description' => 'update house']);
        $housePermission5 = Permission::create(['name' => 'delete: house', 'description' => 'delete house']);

        //Entrance Model
        $entrancePermission1 = Permission::create(['name' => 'create: entrance', 'description' => 'create entrance']);
        $entrancePermission2 = Permission::create(['name' => 'read: entrance', 'description' => 'read entrance']);
        $entrancePermission3 = Permission::create(['name' => 'getById: entrance', 'description' => 'getById entrance']);
        $entrancePermission4 = Permission::create(['name' => 'update: entrance', 'description' => 'update entrance']);
        $entrancePermission5 = Permission::create(['name' => 'delete: entrance', 'description' => 'delete entrance']);

        //Floor Model
        $floorPermission1 = Permission::create(['name' => 'create: floor', 'description' => 'create floor']);
        $floorPermission2 = Permission::create(['name' => 'read: floor', 'description' => 'read floor']);
        $floorPermission3 = Permission::create(['name' => 'getById: floor', 'description' => 'getById floor']);
        $floorPermission4 = Permission::create(['name' => 'update: floor', 'description' => 'update floor']);
        $floorPermission5 = Permission::create(['name' => 'delete: floor', 'description' => 'delete floor']);

        //Apartment Model
        $apartmentPermission1 = Permission::create(['name' => 'create: apartment', 'description' => 'create apartment']);
        $apartmentPermission2 = Permission::create(['name' => 'read: apartment', 'description' => 'read apartment']);
        $apartmentPermission3 = Permission::create(['name' => 'getById: apartment', 'description' => 'getById apartment']);
        $apartmentPermission4 = Permission::create(['name' => 'update: apartment', 'description' => 'update apartment']);
        $apartmentPermission5 = Permission::create(['name' => 'delete: apartment', 'description' => 'delete apartment']);

        //SoldHouse Model
        $soldHousePermission1 = Permission::create(['name' => 'create: soldHouse', 'description' => 'create soldHouse']);
        $soldHousePermission2 = Permission::create(['name' => 'read: soldHouse', 'description' => 'read soldHouse']);
        $soldHousePermission3 = Permission::create(['name' => 'getById: soldHouse', 'description' => 'getById soldHouse']);
        $soldHousePermission4 = Permission::create(['name' => 'update: soldHouse', 'description' => 'update soldHouse']);
        $soldHousePermission5 = Permission::create(['name' => 'delete: soldHouse', 'description' => 'delete soldHouse']);

        //Client Model
        $clientPermission1 = Permission::create(['name' => 'create: client', 'description' => 'create client']);
        $clientPermission2 = Permission::create(['name' => 'read: client', 'description' => 'read client']);
        $clientPermission3 = Permission::create(['name' => 'getById: client', 'description' => 'getById client']);
        $clientPermission4 = Permission::create(['name' => 'update: client', 'description' => 'update client']);
        $clientPermission5 = Permission::create(['name' => 'delete: client', 'description' => 'delete client']);

        //Create roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $accountantRole = Role::create(['name' => 'accountant']);
        $managerRole = Role::create(['name' => 'manager']);

        //connect permissions to roles
        $superAdminRole->syncPermissions([
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,

            $housePermission1,
            $housePermission2,
            $housePermission3,
            $housePermission4,
            $housePermission5,

            $entrancePermission1,
            $entrancePermission2,
            $entrancePermission3,
            $entrancePermission4,
            $entrancePermission5,

            $floorPermission1,
            $floorPermission2,
            $floorPermission3,
            $floorPermission4,
            $floorPermission5,

            $apartmentPermission1,
            $apartmentPermission2,
            $apartmentPermission3,
            $apartmentPermission4,
            $apartmentPermission5,

            $soldHousePermission1,
            $soldHousePermission2,
            $soldHousePermission3,
            $soldHousePermission4,
            $soldHousePermission5,

            $clientPermission1,
            $clientPermission2,
            $clientPermission3,
            $clientPermission4,
            $clientPermission5,
        ]);

        $accountantRole->syncPermissions([
            $soldHousePermission2,
            $soldHousePermission3,
        ]);

        $managerRole->syncPermissions([
            $housePermission2,
            $housePermission3,

            $entrancePermission2,
            $entrancePermission3,

            $floorPermission2,
            $floorPermission3,

            $apartmentPermission2,
            $apartmentPermission3,

            $soldHousePermission2,
            $soldHousePermission3,

            $clientPermission2,
            $clientPermission3,
        ]);

        $superAdmin = User::create([
            'name' => 'super admin',
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $accountant = User::create([
            'name' => 'accountant',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $manager = User::create([
            'name' => 'manager',
            'email' => 'moderator@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $superAdmin->syncRoles([$superAdminRole])->syncPermissions([
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,

            $housePermission1,
            $housePermission2,
            $housePermission3,
            $housePermission4,
            $housePermission5,

            $entrancePermission1,
            $entrancePermission2,
            $entrancePermission3,
            $entrancePermission4,
            $entrancePermission5,

            $floorPermission1,
            $floorPermission2,
            $floorPermission3,
            $floorPermission4,
            $floorPermission5,

            $apartmentPermission1,
            $apartmentPermission2,
            $apartmentPermission3,
            $apartmentPermission4,
            $apartmentPermission5,

            $soldHousePermission1,
            $soldHousePermission2,
            $soldHousePermission3,
            $soldHousePermission4,
            $soldHousePermission5,

            $clientPermission1,
            $clientPermission2,
            $clientPermission3,
            $clientPermission4,
            $clientPermission5,
        ]);

        $accountant->syncRoles([$accountantRole])->syncPermissions([
            $soldHousePermission2,
            $soldHousePermission3,
        ]);

        $manager->syncRoles($managerRole)->syncPermissions([
            $housePermission2,
            $housePermission3,

            $entrancePermission2,
            $entrancePermission3,

            $floorPermission2,
            $floorPermission3,

            $apartmentPermission2,
            $apartmentPermission3,

            $soldHousePermission2,
            $soldHousePermission3,

            $clientPermission2,
            $clientPermission3,
        ]);
    }
}
