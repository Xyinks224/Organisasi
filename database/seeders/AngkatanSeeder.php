<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use Illuminate\Database\Seeder;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Angkatan::insert([
            [
                'id'  => 1,
                'nomor_angkatan'   => 1,
                'nama_angkatan'   => 'first',
                'tahun_lahir'   => 2000,
            ],


            [
                'id'  => 2,
                'nomor_angkatan'   => 2,
                'nama_angkatan'   => 'second',
                'tahun_lahir'   => 2010,
            ],

        ]);
    }
}
