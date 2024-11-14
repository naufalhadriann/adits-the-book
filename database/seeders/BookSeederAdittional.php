<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeederAdittional extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            // Manga Blue Lock (Part 1-10)
            [
                'title' => 'Blue Lock Part 1',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 120000,
                'category_id' => 9,  // Manga
                'stock' => 5,
                'publish_date' => Carbon::create('2022', '01', '05'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 2',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 125000,
                'category_id' => 9,
                'stock' => 3,
                'publish_date' => Carbon::create('2022', '03', '04'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 3',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 125000,
                'category_id' => 9,
                'stock' => 2,
                'publish_date' => Carbon::create('2022', '05', '22'),
                'discount' => 0,
            ],
            // Continue for Blue Lock Parts 4 to 10
            [
                'title' => 'Blue Lock Part 4',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 130000,
                'category_id' => 9,
                'stock' => 4,
                'publish_date' => Carbon::create('2022', '07', '10'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 5',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 130000,
                'category_id' => 9,
                'stock' => 6,
                'publish_date' => Carbon::create('2022', '09', '15'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 6',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 130000,
                'category_id' => 9,
                'stock' => 4,
                'publish_date' => Carbon::create('2022', '10', '05'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 7',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 135000,
                'category_id' => 9,
                'stock' => 5,
                'publish_date' => Carbon::create('2022', '11', '20'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 8',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 135000,
                'category_id' => 9,
                'stock' => 6,
                'publish_date' => Carbon::create('2022', '12', '11'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 9',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 140000,
                'category_id' => 9,
                'stock' => 5,
                'publish_date' => Carbon::create('2023', '01', '22'),
                'discount' => 0,
            ],
            [
                'title' => 'Blue Lock Part 10',
                'image' => 'images/blue.lock',
                'description' => 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… 
                Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan
                300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki
                yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. 
                 Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana 
                 mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!',
                'penerbit' => 'Elex Media',
                'author' => 'Muneyuki Kaneshiro',
                'price' => 140000,
                'category_id' => 9,
                'stock' => 5,
                'publish_date' => Carbon::create('2023', '03', '14'),
                'discount' => 0,
            ],

            // Non-Fiction Books (Pelajaran)
            [
                'title' => 'Matematika Dasar untuk Pemula',
                'image' => 'images/math.basic',
                'description' => 'Buku ini memberikan pemahaman dasar matematika yang mudah dipahami untuk pemula. Cocok untuk pelajaran tingkat sekolah dasar dan menengah.',
                'penerbit' => 'Gramedia',
                'author' => 'Ahmad Fikri',
                'price' => 80000,
                'category_id' => 10,  // Non-Fiksi
                'stock' => 10,
                'publish_date' => Carbon::create('2023', '01', '10'),
                'discount' => 0,
            ],
            [
                'title' => 'Sejarah Dunia: Dari Pra-Sejarah hingga Modern',
                'image' => 'images/history.world',
                'description' => 'Mempelajari sejarah dunia dari zaman prasejarah hingga masa modern. Buku ini memberikan gambaran yang jelas dan terperinci.',
                'penerbit' => 'Erlangga',
                'author' => 'Rizky Wijaya',
                'price' => 100000,
                'category_id' => 8,  // Non-Fiksi
                'stock' => 7,
                'publish_date' => Carbon::create('2023', '05', '20'),
                'discount' => 0,
            ],
            // Additional Non-Fiction Books
            [
                'title' => 'Pengenalan Psikologi Umum',
                'image' => 'images/psychology.intro',
                'description' => 'Buku ini memberikan pengantar kepada psikologi dasar, membahas perilaku manusia, proses berpikir, serta kondisi mental dan emosional.',
                'penerbit' => 'Pustaka Elex',
                'author' => 'Dr. Siti Nur Azizah',
                'price' => 95000,
                'category_id' => 6,  // Non-Fiksi
                'stock' => 8,
                'publish_date' => Carbon::create('2023', '06', '15'),
                'discount' => 0,
            ],
            [
                'title' => 'Teknologi dan Inovasi: Menyongsong Masa Depan',
                'image' => 'images/technology.innovation',
                'description' => 'Buku ini membahas berbagai perkembangan teknologi terbaru dan dampaknya terhadap dunia industri serta masyarakat.',
                'penerbit' => 'TechBooks',
                'author' => 'Wahyu Hidayat',
                'price' => 120000,
                'category_id' => 23,  // Non-Fiksi
                'stock' => 10,
                'publish_date' => Carbon::create('2023', '08', '05'),
                'discount' => 0,
            ],
            [
                'title' => 'Sains dalam Kehidupan Sehari-hari',
                'image' => 'images/science.daily',
                'description' => 'Membahas bagaimana sains mempengaruhi kehidupan sehari-hari kita, dari makanan hingga teknologi yang kita gunakan.',
                'penerbit' => 'Sinergi Pustaka',
                'author' => 'Andi Prasetyo',
                'price' => 115000,
                'category_id' => 7,  // Non-Fiksi
                'stock' => 12,
                'publish_date' => Carbon::create('2023', '09', '10'),
                'discount' => 0,
            ],
            [
                'title' => 'Kepemimpinan yang Efektif di Era Digital',
                'image' => 'images/leadership.digital',
                'description' => 'Buku ini membahas konsep kepemimpinan dalam dunia digital yang semakin berkembang, serta bagaimana menjadi pemimpin yang efektif.',
                'penerbit' => 'Leadership Books',
                'author' => 'Teddy Hermawan',
                'price' => 150000,
                'category_id' => 10,  // Non-Fiksi
                'stock' => 6,
                'publish_date' => Carbon::create('2023', '10', '01'),
                'discount' => 0,
            ],
            [
                'title' => 'Manajemen Waktu yang Efektif',
                'image' => 'images/time.management',
                'description' => 'Buku ini menawarkan berbagai teknik dan strategi untuk mengelola waktu dengan lebih baik, membantu pembaca menjadi lebih produktif.',
                'penerbit' => 'Productivity Press',
                'author' => 'Dina Suryani',
                'price' => 95000,
                'category_id' => 10,  // Non-Fiksi
                'stock' => 15,
                'publish_date' => Carbon::create('2023', '11', '10'),
                'discount' => 0,
            ],
            [
                'title' => 'Mengapa Kita Perlu Pendidikan Finansial',
                'image' => 'images/financial.education',
                'description' => 'Buku ini membahas pentingnya pendidikan finansial dalam mengelola keuangan pribadi dan membangun masa depan yang lebih stabil.',
                'penerbit' => 'Indigo Press',
                'author' => 'Agus Santoso',
                'price' => 110000,
                'category_id' => 10,  // Non-Fiksi
                'stock' => 9,
                'publish_date' => Carbon::create('2023', '12', '05'),
                'discount' => 30,
            ],
            [
                'title' => 'Kreativitas dan Inovasi dalam Bisnis',
                'image' => 'images/creativity.innovation',
                'description' => 'Buku ini mengulas bagaimana kreativitas dapat diterapkan dalam dunia bisnis untuk menciptakan produk dan layanan inovatif.',
                'penerbit' => 'Creative Books',
                'author' => 'Rika Cahyani',
                'price' => 130000,
                'category_id' => 10,  // Non-Fiksi
                'stock' => 14,
                'publish_date' => Carbon::create('2024', '01', '10'),
                'discount' => 0,
            ],
            [
                'title' => 'Kebijakan Publik di Indonesia: Teori dan Praktik',
                'image' => 'images/public.policy',
                'description' => 'Buku ini memberikan analisis mendalam tentang kebijakan publik di Indonesia, mencakup teori dan implementasinya dalam konteks lokal.',
                'penerbit' => 'IndoBooks',
                'author' => 'Solehuddin A',
                'price' => 140000,
                'category_id' => 10,  // Non-Fiksi
                'stock' => 10,
                'publish_date' => Carbon::create('2024', '02', '18'),
                'discount' => 0,
            ],
            [
                'title' => 'Sejarah Dunia: Dari Pra-Sejarah hingga Modern',
                'image' => 'images/history.world',
                'description' => 'Mempelajari sejarah dunia dari zaman prasejarah hingga masa modern. Buku ini memberikan gambaran yang jelas dan terperinci.',
                'penerbit' => 'Erlangga',
                'author' => 'Rizky Wijaya',
                'price' => 100000,
                'category_id' => 10,  // Non-Fiksi
                'stock' => 7,
                'publish_date' => Carbon::create('2023', '05', '20'),
                'discount' => 0,
            ],

            // Business Books (Pemasaran & Manajemen)
            [
                'title' => 'Strategi Pemasaran Digital untuk Pemula',
                'image' => 'images/marketing.digital',
                'description' => 'Buku ini akan membahas berbagai strategi pemasaran digital yang efektif untuk bisnis kecil hingga besar.',
                'penerbit' => 'Katalis',
                'author' => 'Dwi Suryani',
                'price' => 150000,
                'category_id' => 11,  // Bisnis
                'stock' => 8,
                'publish_date' => Carbon::create('2023', '06', '15'),
                'discount' => 0,
            ],
            [
                'title' => 'Manajemen Keuangan untuk Usaha Kecil',
                'image' => 'images/finance.management',
                'description' => 'Buku ini memberikan panduan tentang manajemen keuangan untuk pemilik usaha kecil agar mereka bisa mengelola keuangan dengan lebih baik.',
                'penerbit' => 'Indigo',
                'author' => 'Budi Santoso',
                'price' => 120000,
                'category_id' => 12,  // Bisnis
                'stock' => 12,
                'publish_date' => Carbon::create('2023', '07', '18'),
                'discount' => 0,
            ],
        ];

        foreach ($books as $book) {
            DB::table('book')->insert($book);
        }
    }
}
