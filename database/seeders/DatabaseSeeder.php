<?php

namespace Database\Seeders;

use App\models\Buku;
use App\models\User;
use App\Models\Profile;
use App\models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the Application's database.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
