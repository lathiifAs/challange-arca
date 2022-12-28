<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kontaks = [
            [
               'id'=>1,
            ],
        ];

        foreach ($kontaks as $key => $kontak) {
            Kontak::create($kontak);
        }
    }
}
