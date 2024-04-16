<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role_name'=>'ROLE_ADMIN',
                'role_description'=>'admin'
            ],
            [
                'role_name'=>'ROLE_PROJECT_MANAGER',
                'role_description'=>'project manager'
            ],
            [
                'role_name'=>'ROLE_STAFF',
                'role_description'=>'staff'
            ],
            [
                'role_name'=>'ROLE_LEADER',
                'role_description'=>'leader'
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
