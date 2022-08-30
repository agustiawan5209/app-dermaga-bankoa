<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Role::insert([
            ['name_role'=> 'Admin'],
            ['name_role'=> 'Pemilik'],
            ['name_role'=> 'Customer']
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Destinasi::insert([
            [
                'lokasi' => 'Pulau lae-lae',
                'harga' => '120000'
            ],
            [
                'lokasi' => 'Pulau kahyangan ',
                'harga' => '120000'
            ],
            [
                'lokasi' => 'Pulau Samalona ',
                'harga' => '120000'
            ],
            [
                'lokasi' => 'Pulau Caddi ',
                'harga' => '120000'
            ],
            [
                'lokasi' => 'Pulau barrang Lompo',
                'harga' => '120000'
            ],
            [
                'lokasi' => 'Pulau Kodingareng',
                'harga' => '120000'
            ],
        ]);
    }
}
