<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Customer::factory(50)->create();
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
            'role_id' => Role::findOrFail(1)->first()->id
        ]);

        User::create([
            'name' => 'Test',
            'lastname' => 'User',
            'email' => 'user@user',
            'password' => bcrypt('user@user'),
            'employed_from' => date('Y-m-d', strtotime('now')),
            'role_id' => Role::findOrFail(2)->first()->id
        ]);
    }
}
