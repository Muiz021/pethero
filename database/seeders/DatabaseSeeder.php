<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'nama' => 'Muiz Muharram',
            'username' => 'muiz021',
            'slug' => Str::slug('Muiz Muharram', '-'),
            'nomor_ponsel' => '081343671284',
            'password' => bcrypt('12345678'),
            'roles' => 'member',
        ]);

        User::create([
            'nama' => 'Irma Suriani S',
            'username' => 'admin',
            'slug' => Str::slug('Irma Suriani S', '-'),
            'nomor_ponsel' => '082193793624',
            'password' => bcrypt('12345678'),
            'roles' => 'admin',
        ]);
    }
}
