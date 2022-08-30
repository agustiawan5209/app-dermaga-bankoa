<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
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
        \App\Models\Role::insert([['name_role' => 'Admin'], ['name_role' => 'Pemilik'], ['name_role' => 'Customer']]);

        \App\Models\User::insert([
            [
                'name' => 'Admin',
                'email' => 'Admin@super.com',
                'password' => bcrypt('12345678'),
                'role_id' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Pemilik',
                'email' => 'Pemilik@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Customer',
                'email' => 'Customer@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => '3',
                'created_at' => Carbon::now(),
            ],
        ]);
        \App\Models\Destinasi::insert([
            [
                'lokasi' => 'Pulau lae-lae',
                'harga' => '120000',
            ],
            [
                'lokasi' => 'Pulau kahyangan ',
                'harga' => '120000',
            ],
            [
                'lokasi' => 'Pulau Samalona ',
                'harga' => '120000',
            ],
            [
                'lokasi' => 'Pulau Caddi ',
                'harga' => '120000',
            ],
            [
                'lokasi' => 'Pulau barrang Lompo',
                'harga' => '120000',
            ],
            [
                'lokasi' => 'Pulau Kodingareng',
                'harga' => '120000',
            ],
        ]);
    }
}
