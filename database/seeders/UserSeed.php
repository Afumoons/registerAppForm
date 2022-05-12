<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rizki',
            'email' => 'akasa2444@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'super admin',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
