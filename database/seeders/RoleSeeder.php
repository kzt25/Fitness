<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        'name' =>'Free',
        'guard_name' => 'web'
        ]);

        Role::create([
            'name' =>'Platinum',
            'guard_name' => 'web'
            ]);

        Role::create([
        'name' =>'Gold',
        'guard_name' => 'web'
        ]);

        Role::create([
            'name' =>'Diamond',
            'guard_name' => 'web'
            ]);

        Role::create([
            'name' =>'Ruby',
            'guard_name' => 'web'
            ]);

        Role::create([
            'name' =>'Ruby Premium',
            'guard_name' => 'web'
            ]);

    }
}
