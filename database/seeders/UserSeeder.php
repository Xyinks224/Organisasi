<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::insert([
            [
                'nama_lengkap'  => 'admin',
                'nama_lapang'   => 'admin',
                'nomor_induk'   => null,
                'nomor_wa'      => null,
                'alamat'        => null,
                'id_angkatans'  => null,
                'email'         => 'admin@gmail.com',
                'password'      => Hash::make('1234567890'),
                'level'         => 1
            ],


            [
                'nama_lengkap'  => 'yuki',
                'nama_lapang'   => 'yuki',
                'nomor_induk'   => '1234',
                'nomor_wa'      => '1234',
                'alamat'        => 'malang',
                'id_angkatans'  => 1,
                'email'         => 'yukikitori5@gmail.com',
                'password'      => Hash::make('12345678'),
                'level'         => 2,
            ]

        ]);
    }
}
