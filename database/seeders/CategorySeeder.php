<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array kategori dan genre buku
        $categories = [
            ['name' => 'Fiksi', 'genre' => 'Drama'],
            ['name' => 'Fiksi', 'genre' => 'Romansa'],
            ['name' => 'Fiksi', 'genre' => 'Fantasi'],
            ['name' => 'Fiksi', 'genre' => 'Horror'],
            ['name' => 'Non-Fiksi', 'genre' => 'Biografi'],
            ['name' => 'Non-Fiksi', 'genre' => 'Pendidikan'],
            ['name' => 'Non-Fiksi', 'genre' => 'Sains'],
            ['name' => 'Non-Fiksi', 'genre' => 'Sejarah'],
            ['name' => 'Komik', 'genre' => 'Manga'],
            ['name' => 'Komik', 'genre' => 'Superhero'],
            ['name' => 'Bisnis', 'genre' => 'Pemasaran'],
            ['name' => 'Bisnis', 'genre' => 'Manajemen'],
            ['name' => 'Motivasi', 'genre' => 'Kehidupan'],
            ['name' => 'Motivasi', 'genre' => 'Kewirausahaan'],
            ['name' => 'Agama', 'genre' => 'Islam'],
            ['name' => 'Agama', 'genre' => 'Kristen'],
            ['name' => 'Filsafat', 'genre' => 'Filsafat Barat'],
            ['name' => 'Filsafat', 'genre' => 'Filsafat Timur'],
            ['name' => 'Hukum', 'genre' => 'Perundang-undangan'],
            ['name' => 'Hukum', 'genre' => 'Kriminal'],
            ['name' => 'Kesehatan', 'genre' => 'Psikologi'],
            ['name' => 'Kesehatan', 'genre' => 'Gizi'],
            ['name' => 'Teknologi', 'genre' => 'IT'],
            ['name' => 'Teknologi', 'genre' => 'AI'],
            ['name' => 'Sosial', 'genre' => 'Sosiologi'],
            ['name' => 'Sosial', 'genre' => 'Psikologi Sosial'],
        ];

        // Menyimpan kategori dan genre ke dalam database
        foreach ($categories as $category) {
            DB::table('category')->insert($category);
        }
    }
}
