<?php

namespace Database\Seeders;

use App\models\Buku;
use App\models\User;
use App\Models\Profile;
use App\models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the Application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seed User Admin
        User::create([
            'name' => 'Admin Perpus',
            'email' => 'adminperpus@smkn1-wnb.sch.id',
            'password' => Hash::make('smakanza123'),
            'isAdmin' => '1',
        ]);

        Profile::create([
            'npm' => 'adminperpus',
            'prodi' => 'adminperpus',
            'alamat' => 'SMK N 1 Wonosobo',
            'noTelp' => 'SMAKANZA',
            'users_id' => '1',
        ]);

        $firstNames = ['Rudi', 'Siti', 'Dewi', 'Agus', 'Nina', 'Bayu', 'Rina', 'Fajar', 'Fitri', 'Andi', 'Lia', 'Yusuf', 'Tari', 'Rizky', 'Putri'];
        $lastNames  = ['Hartono', 'Wijaya', 'Saputra', 'Santoso', 'Utami', 'Wibowo', 'Kurniawan', 'Prasetyo', 'Maulana', 'Susanti'];


        $prodis = [
            'Rekayasa Perangkat Lunak',
            'Multimedia',
            'Teknik Komputer dan Jaringan',
            'Akuntansi',
            'Administrasi Perkantoran'
        ];

        $alamats = [
            'Jl. Diponegoro No.10, Semarang',
            'Jl. Slamet Riyadi No.25, Surakarta',
            'Jl. Pemuda No.5, Purwokerto',
            'Jl. Letjen Suprapto No.30, Magelang',
            'Jl. A. Yani No.100, Tegal',
            'Jl. Gatot Subroto No.45, Pekalongan',
            'Jl. Kartini No.12, Salatiga',
            'Jl. Jenderal Sudirman No.88, Kudus',
            'Jl. KH. Ahmad Dahlan No.17, Kebumen',
            'Jl. S. Parman No.55, Cilacap'
        ];

        for ($i = 1; $i <= 20; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $fullName = $firstName . ' ' . $lastName;

            $email = Str::slug($firstName . '.' . $lastName) . '@gmail.com';
            $password = Hash::make('password123');

            $user = User::create([
                'name' => $fullName,
                'email' => strtolower($email),
                'password' => $password,
                'isAdmin' => 0,
            ]);

            Profile::create([
                'npm'      => strval(rand(10000000, 99999999)),
                'prodi'    => $prodis[array_rand($prodis)],
                'alamat'   => $alamats[array_rand($alamats)],
                'noTelp'   => '08' . rand(100000000, 999999999),
                'users_id' => $user->id,
            ]);
        }

        //Seed Kategori
        $kategori = [
            ['nama' => 'Fiksi', 'deskripsi' => 'Cerita rekaan yang berasal dari imajinasi.'],
            ['nama' => 'Non-Fiksi', 'deskripsi' => 'Buku yang berdasarkan fakta dan kenyataan.'],
            ['nama' => 'Biografi', 'deskripsi' => 'Kisah hidup seseorang yang ditulis secara naratif.'],
            ['nama' => 'Sejarah', 'deskripsi' => 'Buku tentang peristiwa masa lalu dan penting.'],
            ['nama' => 'Teknologi', 'deskripsi' => 'Buku tentang perkembangan alat, mesin, dan sistem.'],
            ['nama' => 'Sains', 'deskripsi' => 'Ilmu pengetahuan alam dan eksperimen ilmiah.'],
            ['nama' => 'Psikologi', 'deskripsi' => 'Studi tentang perilaku dan proses mental manusia.'],
            ['nama' => 'Agama', 'deskripsi' => 'Buku spiritual dan kepercayaan keagamaan.'],
            ['nama' => 'Sastra', 'deskripsi' => 'Karya tulis bernilai seni seperti puisi dan prosa.'],
            ['nama' => 'Bisnis', 'deskripsi' => 'Strategi dan manajemen dalam dunia usaha.'],
        ];

        foreach ($kategori as $kat) {
            Kategori::create([
                'nama' => $kat['nama'],
                'deskripsi' => $kat['deskripsi'],
            ]);
        }

        //Seed Buku
        $databuku = [
            [
                'judul' => 'Misteri di Balik Hutan',
                'pengarang' => 'Agus Santoso',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2020,
                'deskripsi' => 'Novel misteri yang mengungkap rahasia hutan larangan.',
            ],
            [
                'judul' => 'Belajar Laravel dengan Mudah',
                'pengarang' => 'Dian Hartono',
                'penerbit' => 'Informatika',
                'tahun_terbit' => 2021,
                'deskripsi' => 'Panduan lengkap belajar Laravel dari nol.',
            ],
            [
                'judul' => 'Psikologi Remaja',
                'pengarang' => 'Siti Nurjanah',
                'penerbit' => 'Prenada',
                'tahun_terbit' => 2019,
                'deskripsi' => 'Membahas dinamika psikologi pada masa remaja.',
            ],
            [
                'judul' => 'Dasar-Dasar Ekonomi',
                'pengarang' => 'Budi Prasetyo',
                'penerbit' => 'Salemba',
                'tahun_terbit' => 2018,
                'deskripsi' => 'Memahami konsep ekonomi untuk pemula.',
            ],
            [
                'judul' => 'Petualangan Matematika',
                'pengarang' => 'Rina Kurnia',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => 2022,
                'deskripsi' => 'Buku interaktif belajar matematika.',
            ],
            [
                'judul' => 'Filsafat Hidup Modern',
                'pengarang' => 'Ahmad Rifa’i',
                'penerbit' => 'Yayasan Ilmu',
                'tahun_terbit' => 2020,
                'deskripsi' => 'Refleksi hidup di tengah dunia modern.',
            ],
            [
                'judul' => 'Algoritma dan Pemrograman',
                'pengarang' => 'Linda Wati',
                'penerbit' => 'Andi Publisher',
                'tahun_terbit' => 2021,
                'deskripsi' => 'Dasar pemrograman dan logika algoritmik.',
            ],
            [
                'judul' => 'Atlas Dunia Anak',
                'pengarang' => 'Tomi Rachman',
                'penerbit' => 'Bhuana Ilmu',
                'tahun_terbit' => 2023,
                'deskripsi' => 'Atlas bergambar untuk edukasi anak.',
            ],
            [
                'judul' => 'Strategi Pemasaran Digital',
                'pengarang' => 'Dewi Astuti',
                'penerbit' => 'Penerbit Cerdas',
                'tahun_terbit' => 2022,
                'deskripsi' => 'Mengenal teknik pemasaran online.',
            ],
            [
                'judul' => 'Panduan Menulis Kreatif',
                'pengarang' => 'Yusuf Ananda',
                'penerbit' => 'Literasi Kita',
                'tahun_terbit' => 2019,
                'deskripsi' => 'Tips menulis cerita fiksi & non-fiksi.',
            ],
            [
                'judul' => 'Ilmu Lingkungan',
                'pengarang' => 'Sari Melati',
                'penerbit' => 'Hijau Press',
                'tahun_terbit' => 2020,
                'deskripsi' => 'Pentingnya menjaga kelestarian alam.',
            ],
            [
                'judul' => 'Manajemen Keuangan Modern',
                'pengarang' => 'David Nugroho',
                'penerbit' => 'Cakrawala',
                'tahun_terbit' => 2018,
                'deskripsi' => 'Konsep pengelolaan keuangan kontemporer.',
            ],
            [
                'judul' => 'Kesehatan Mental Anak',
                'pengarang' => 'Indah Permata',
                'penerbit' => 'Sehat Media',
                'tahun_terbit' => 2021,
                'deskripsi' => 'Pentingnya mendeteksi dini gangguan psikologis.',
            ],
            [
                'judul' => 'Teknologi dan Masyarakat',
                'pengarang' => 'Teguh Prasetya',
                'penerbit' => 'Digital Press',
                'tahun_terbit' => 2022,
                'deskripsi' => 'Dampak teknologi terhadap kehidupan sosial.',
            ],
            [
                'judul' => 'Sejarah Nusantara',
                'pengarang' => 'Raka Wijaya',
                'penerbit' => 'Nusantara Raya',
                'tahun_terbit' => 2017,
                'deskripsi' => 'Perjalanan sejarah Indonesia dari masa ke masa.',
            ],
        ];

        for ($i = 0; $i < 100; $i++) {
            $template = $databuku[$i % count($databuku)];

            $judulInisial = strtoupper(substr(preg_replace('/\s+/', '', $template['judul']), 0, 3));
            $penerbitInisial = strtoupper(substr(preg_replace('/\s+/', '', $template['penerbit']), 0, 3));
            $kodeBuku = sprintf("%s-%04d-%s-%d", $judulInisial, $i + 1, $penerbitInisial, $template['tahun_terbit']);


            $book = Buku::create([
                'kode_buku'     => $kodeBuku,
                'judul'         => $template['judul'],
                'pengarang'     => $template['pengarang'],
                'penerbit'      => $template['penerbit'],
                'tahun_terbit'  => $template['tahun_terbit'],
                'deskripsi'     => $template['deskripsi'],
            ]);
            $kategoriIds = collect(range(1, 5))->random(2)->toArray();
            $book->kategori_buku()->sync($kategoriIds);
        }
    }
}
