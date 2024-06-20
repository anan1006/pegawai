<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        DB::table('users')->insert([
            "id" => Str::uuid(),
            'name' => "admin restoran",
            'email' => "restoran@gmail.com",
            'password' => Hash::make("12345678"),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('pegawais')->insert([
        //         'nama_pegawai' => $faker->name,
        //         'alamat' => $faker->address,
        //         'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         'telepon' => $faker->phoneNumber,
        //         'email' => $faker->unique()->safeEmail,
        //         'foto' => $faker->imageUrl($width = 640, $height = 480),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }
    }
}
