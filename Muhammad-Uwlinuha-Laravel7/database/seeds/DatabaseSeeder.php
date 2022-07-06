<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call([
        //     UserSeeder::class,
        //     CustomerSeeder::class,
        //     // CommentSeeder::class,
        // ]);

        $datauser = [
            [
                'name' => 'admin',
                'email' => 'admin@cyberolympus.com',
                'password' => Hash::make('cyberadmin'),
                'created_at' => new \DateTime,
                'updated_at' => null
            ]
        ];
        DB::table('users')->insert($datauser);


        $datacustomer = [
            [
                'id' => '1',
                'nama' => 'Superman',
                'alamat' => 'Yogyakarta',
                'telepon' => '0888888888',
                'created_at' => new \DateTime,
                'updated_at' => null
            ],
            [
                'id' => '2',
                'nama' => 'Batman',
                'alamat' => 'Jakarta',
                'telepon' => '0888888888',
                'created_at' => new \DateTime,
                'updated_at' => null
            ],
            [
                'id' => '3',
                'nama' => 'Siperman',
                'alamat' => 'Bali',
                'telepon' => '0888888888',
                'created_at' => new \DateTime,
                'updated_at' => null
            ]
        ];
        
        DB::table('customers')->insert($datacustomer);
    }
}
