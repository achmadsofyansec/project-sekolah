<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'roles_name' => 'Administrator',
            'roles_access' => 'admin',
            'id_roles' => 1,
        ],[
            'roles_name' => 'Staff Akademik',
            'roles_access' => 'akademik',
            'id_roles' => 2,
        ],
        [
            'roles_name' => 'Staff Keuangan',
            'roles_access' => 'keuangan',
            'id_roles' => 3,
        ],
        [
            'roles_name' => 'Staff Kesiswaan',
            'roles_access' => 'kesiswaan',
            'id_roles' => 4,
        ],
    ]);
    }
}
