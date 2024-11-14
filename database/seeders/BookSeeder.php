<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array data buku
        $books = [
            // Buku-buku Nonfiksi atau Fiksi
            [
                'title' => 'Laskar Pelangi',
                'image' => 'images/laskar_pelangi.jpg',
                'description' => 'Kisah tentang perjuangan anak-anak di Belitong untuk meraih pendidikan di tengah keterbatasan.',
                'penerbit' => 'Bentang Pustaka',
                'author' => 'Andrea Hirata',
                'price' => 95000.00,
                'category_id' => 2,  // Non-Fiksi atau Fiksi
                'stock' => 200,
                'publish_date' => Carbon::create('2005', '09', '01'),
                'discount' => 10.00,
            ],
            [
                'title' => 'Hujan',
                'image' => 'images/hujan_book.jpg',
                'description' => 'Sebuah kisah romantis dan penuh emosi yang menceritakan tentang perasaan, kehilangan, dan harapan.',
                'penerbit' => 'Gramedia Pustaka Utama',
                'author' => 'Tere Liye',
                'price' => 120000.00,
                'category_id' => 2,
                'stock' => 150,
                'publish_date' => Carbon::create('2019', '04', '10'),
                'discount' => 8.00,
            ],
            [
                'title' => 'Bumi',
                'image' => 'images/bumi_book.jpg',
                'description' => 'Petualangan Rimba dan teman-temannya di dunia yang penuh keajaiban dan kekuatan luar biasa.',
                'penerbit' => 'GPU',
                'author' => 'Tere Liye',
                'price' => 110000.00,
                'category_id' => 2,
                'stock' => 180,
                'publish_date' => Carbon::create('2014', '11', '15'),
                'discount' => 15.00,
            ],
            [
                'title' => 'Mereka yang Tak Terlihat',
                'image' => 'images/mereka_tak_terlihat.jpg',
                'description' => 'Buku ini mengungkap kehidupan orang-orang yang tak terlihat dalam masyarakat, dengan kisah-kisah yang menyentuh.',
                'penerbit' => 'Gramedia',
                'author' => 'Pidi Baiq',
                'price' => 130000.00,
                'category_id' => 2,
                'stock' => 120,
                'publish_date' => Carbon::create('2020', '06', '11'),
                'discount' => 12.00,
            ],
            [
                'title' => 'The Architecture of Love',
                'image' => 'images/architecture_of_love.jpg',
                'description' => 'Kisah cinta antara dua insan yang terbentur oleh latar belakang keluarga dan perbedaan status sosial.',
                'penerbit' => 'Gramedia',
                'author' => 'Ika Natassa',
                'price' => 145000.00,
                'category_id' => 2,
                'stock' => 200,
                'publish_date' => Carbon::create('2021', '09', '10'),
                'discount' => 7.00,
            ],
            [
                'title' => 'Pulang',
                'image' => 'images/pulang_book.jpg',
                'description' => 'Kisah tentang seorang anak yang kembali ke kampung halaman untuk menemukan jati dirinya.',
                'penerbit' => 'Gramedia',
                'author' => 'Leila S. Chudori',
                'price' => 135000.00,
                'category_id' => 2,
                'stock' => 110,
                'publish_date' => Carbon::create('2012', '11', '15'),
                'discount' => 5.00,
            ],
            [
                'title' => 'Laut Bercerita',
                'image' => 'images/laut_bercerita_book.jpg',
                'description' => 'Kumpulan cerita tentang kehidupan para nelayan dan kisah-kisah mereka di tengah lautan.',
                'penerbit' => 'Gramedia Pustaka Utama',
                'author' => 'Leila S. Chudori',
                'price' => 125000.00,
                'category_id' => 2,
                'stock' => 80,
                'publish_date' => Carbon::create('2019', '02', '15'),
                'discount' => 8.00,
            ],
            [
                'title' => 'Luka Cita',
                'image' => 'images/luka_cita.jpg',
                'description' => 'Kisah refleksi tentang kehidupan dan cara kita menyikapi luka dalam hidup.',
                'penerbit' => 'Gramedia',
                'author' => 'Alvi Syahrin',
                'price' => 110000.00,
                'category_id' => 2,
                'stock' => 150,
                'publish_date' => Carbon::create('2020', '08', '17'),
                'discount' => 10.00,
            ],
            [
                'title' => 'Maaf Tuhan Aku Hampir Menyerah',
                'image' => 'images/maaf_tuhan_aku_hampir_menyerah.jpg',
                'description' => 'Buku ini menceritakan kisah-kisah hidup yang penuh tantangan dan bagaimana cara bertahan dalam kesulitan.',
                'penerbit' => 'Mizan',
                'author' => 'Tere Liye',
                'price' => 120000.00,
                'category_id' => 2,
                'stock' => 180,
                'publish_date' => Carbon::create('2021', '10', '22'),
                'discount' => 12.00,
            ],
            // Buku Komik
            [
                'title' => 'KNY 1/3',
                'image' => 'images/kny_1_3.jpg',
                'description' => 'Volume pertama dari komik Kimetsu no Yaiba, yang menceritakan perjalanan Tanjiro.',
                'penerbit' => 'Shueisha',
                'author' => 'Koyoharu Gotouge',
                'price' => 75000.00,
                'category_id' => 1,  // Komik
                'stock' => 130,
                'publish_date' => Carbon::create('2019', '07', '01'),
                'discount' => 5.00,
            ],
            [
                'title' => 'Owari no Seraph 1/3',
                'image' => 'images/owari_no_seraph_1_3.jpg',
                'description' => 'Petualangan dan perjuangan para karakter dalam dunia yang penuh dengan vampir dan kekacauan.',
                'penerbit' => 'Shueisha',
                'author' => 'Takaya Kagami',
                'price' => 80000.00,
                'category_id' => 1,  // Komik
                'stock' => 140,
                'publish_date' => Carbon::create('2012', '05', '15'),
                'discount' => 7.00,
            ],
            [
                'title' => 'Spy x Family 1/3',
                'image' => 'images/spy_x_family_1_3.jpg',
                'description' => 'Kisah tentang keluarga yang terdiri dari mata-mata, pembunuh, dan seorang anak telepati.',
                'penerbit' => 'Shueisha',
                'author' => 'Tatsuya Endo',
                'price' => 85000.00,
                'category_id' => 1,  // Komik
                'stock' => 120,
                'publish_date' => Carbon::create('2019', '04', '02'),
                'discount' => 6.00,
            ],
            [
                'title' => 'Aru Shah 1/3',
                'image' => 'images/aru_shah_1_3.jpg',
                'description' => 'Kisah seorang anak perempuan yang terjerat dalam petualangan mitologi India.',
                'penerbit' => 'Disney-Hyperion',
                'author' => 'Roshani Chokshi',
                'price' => 95000.00,
                'category_id' => 1,  // Komik
                'stock' => 110,
                'publish_date' => Carbon::create('2018', '03', '07'),
                'discount' => 5.00,
            ],
            // Buku Lainnya
            [
                'title' => 'Gadis Kretek',
                'image' => 'images/gadis_kretek.jpg',
                'description' => 'Buku tentang sejarah dan budaya rokok kretek serta kisah perempuan-perempuan dalam dunia kretek.',
                'penerbit' => 'Kepustakaan Populer Gramedia',
                'author' => 'Ratih Kumala',
                'price' => 135000.00,
                'category_id' => 2,
                'stock' => 150,
                'publish_date' => Carbon::create('2018', '04', '15'),
                'discount' => 12.00,
            ],
            [
                'title' => 'Sewu Dino',
                'image' => 'images/sewu_dino.jpg',
                'description' => 'Novel horor yang menggabungkan cerita mistis dan sejarah dalam kisah perjalanan hidup manusia.',
                'penerbit' => 'Penerbit Indonesia',
                'author' => 'Ayu Utami',
                'price' => 125000.00,
                'category_id' => 2,
                'stock' => 120,
                'publish_date' => Carbon::create('2020', '12', '10'),
                'discount' => 8.00,
            ],
            [
                'title' => 'Si Anak Badai',
                'image' => 'images/si_anak_badai.jpg',
                'description' => 'Novel ini menceritakan tentang seorang anak muda yang penuh dengan gejolak kehidupan.',
                'penerbit' => 'Gramedia',
                'author' => 'Tere Liye',
                'price' => 115000.00,
                'category_id' => 2,
                'stock' => 160,
                'publish_date' => Carbon::create('2015', '03', '11'),
                'discount' => 10.00,
            ],
            [
                'title' => 'Warung Bujang',
                'image' => 'images/warung_bujang.jpg',
                'description' => 'Cerita lucu tentang kehidupan seorang pria yang hidup sendiri dan menjalankan warung kopi.',
                'penerbit' => 'Gramedia',
                'author' => 'Pidi Baiq',
                'price' => 90000.00,
                'category_id' => 2,
                'stock' => 140,
                'publish_date' => Carbon::create('2021', '07', '05'),
                'discount' => 10.00,
            ],
            [
                'title' => 'Buku Minta Dibanting dan Disayang',
                'image' => 'images/buku_minta_dibanting.jpg',
                'description' => 'Buku tentang cara menikmati hidup melalui perspektif yang humoris dan sarkastik.',
                'penerbit' => 'Grasindo',
                'author' => 'Andrea Hirata',
                'price' => 100000.00,
                'category_id' => 2,
                'stock' => 130,
                'publish_date' => Carbon::create('2021', '10', '25'),
                'discount' => 5.00,
            ],
            [
                'title' => 'Hei Interns!',
                'image' => 'images/hei_interns.jpg',
                'description' => 'Kisah pengalaman para magang dalam dunia kerja yang penuh tantangan dan drama.',
                'penerbit' => 'Mizan',
                'author' => 'Nina',
                'price' => 85000.00,
                'category_id' => 2,
                'stock' => 120,
                'publish_date' => Carbon::create('2022', '01', '11'),
                'discount' => 8.00,
            ],
            [
                'title' => 'Pak Djoko',
                'image' => 'images/pak_djoko.jpg',
                'description' => 'Kisah humoris tentang kehidupan seorang pria bernama Pak Djoko yang penuh dengan kejadian-kejadian kocak.',
                'penerbit' => 'Buku Komedi',
                'author' => 'Togar Sidabutar',
                'price' => 95000.00,
                'category_id' => 2,
                'stock' => 100,
                'publish_date' => Carbon::create('2023', '06', '10'),
                'discount' => 5.00,
            ],
            [
                'title' => 'Jika Kita Tak Pernah Baik-Baik Saja',
                'image' => 'images/jika_kita_tak_pernah_baik_baik_saja.jpg',
                'description' => 'Buku tentang cerita kehidupan yang penuh dengan keputusan-keputusan sulit dan refleksi perasaan.',
                'penerbit' => 'Gramedia',
                'author' => 'Tere Liye',
                'price' => 110000.00,
                'category_id' => 2,
                'stock' => 130,
                'publish_date' => Carbon::create('2023', '04', '05'),
                'discount' => 10.00,
            ]
        ];

        
        foreach ($books as $book) {
            DB::table('book')->insert($book);
        }
    }
}
