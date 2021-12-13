<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
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
        Role::create([
            'name' => 'Administrator',
            'slug' => 'admin'
        ]);
        Role::create([
            'name' => 'User',
            'slug' => 'user'
        ]);

        User::create([
            'name' => 'Test',
            'lastname' => 'Admin',
            'email' => 'test@test',
            'password' => bcrypt('test@test'),
            'employed_from' => date('Y-m-d', strtotime('now')),
            'role_id' => Role::where('slug', 'admin')->first()->id
        ]);

        User::create([
            'name' => 'Test',
            'lastname' => 'User',
            'email' => 'user@user',
            'password' => bcrypt('user@user'),
            'employed_from' => date('Y-m-d', strtotime('now')),
            'role_id' => Role::where('slug', 'user')->first()->id
        ]);

        $allPermissions = [User::getPermissions(), Customer::getPermissions()];
        foreach ($allPermissions as $permissionsPerModel){
            foreach ($permissionsPerModel as $slug => $name){
                Permission::create([
                    'name' => $name,
                    'slug' => $slug
                ]);
            }
        }

        foreach (Permission::all() as $permission){
            User::where('email', 'test@test')->first()->role->permissions()->attach($permission);
        }


        \App\Models\User::factory(10)->create();
        \App\Models\Customer::factory(50)->create();
    }
}
