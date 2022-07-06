<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
