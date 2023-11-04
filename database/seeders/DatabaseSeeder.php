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
        // \App\Models\User::factory(50)->create();
        \App\Models\User::insert([
            [
                'name' => 'Pemilik',
                'email' => 'Pemilik@sugmailper.com',
                'password' => bcrypt('12345678'),
                'role_id' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Pengantar',
                'email' => 'Pengantar@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => '1',
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
            ],
            [
                'lokasi' => 'Pulau kahyangan ',
            ],
            [
                'lokasi' => 'Pulau Samalona ',
            ],
            [
                'lokasi' => 'Pulau Caddi ',
            ],
            [
                'lokasi' => 'Pulau barrang Lompo',
            ],
            [
                'lokasi' => 'Pulau Kodingareng',
            ],
        ]);
    }
}
