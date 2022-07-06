<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $data = [
            [
                'name' => 'admin',
                'email' => 'admin@cyberolympus.com',
                'password' => Hash::make('cyberadmin'),
                'created_at' => new \DateTime,
                'updated_at' => null
            ]
        ];

        DB::table('users')->insert($data);
        
    }
}
