<?php

namespace Database\Seeders;

use App\Models\Tentang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tentangs = [
            [
               'name'=>'Darma Ayu Teknologi',
               'tagline'=>'Solusi Era Digitalisasi',
               'logo_path'=>'file/img/',
               'logo_name'=>'LOGO_DAT.png',
            ],
        ];

        foreach ($tentangs as $key => $tentang) {
            Tentang::create($tentang);
        }
    }
}
