<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Akomodasi;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Akomodasi::insert([
            [
                'gambar' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/t_htl-dskt/tix-hotel/images-web/2022/09/09/ca47247b-1609-49f1-a340-47cbf7a50e1d-1662720329001-b0a8ba24aa1bd18dad182359e7538cf5.jpg',
                'tipe' => 'Deluxe Room (VA-4)',
                'deskripsi' => 'Glamping Deluxe Bed With Sharing Bathroom',
                'harga_asli' => 693106,
                'harga_diskon' => 601874,
                'checkin' => '14:00-21:00',
                'checkout' => '12:00',
                'jumlah_tamu' => 2,
                'luas' => 18,
                'tipe_kasur' => 'Double',
                'fasilitas' => 'Free Wifi',
                'smoking' => False,
                'rekomendasi' => True,
                'created_at' => '2025-11-01 08:33:22',
                'updated_at' => '2025-11-01 08:33:22',
            ],
            [
                'gambar' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/t_htl-dskt/tix-hotel/images-web/2024/11/18/c492f334-6139-43d5-af87-1f21e9bcea37-1731895503294-859ab62d7e19c417bde816a0285d6378.jpg',
                'tipe' => 'Family Room with Mountain View (FR-7)',
                'deskripsi' => 'Family room with Mountain views. It is equipped with a kitchen and private bathroom',
                'harga_asli' => 959685,
                'harga_diskon' => null,
                'checkin' => '14:00-21:00',
                'checkout' => '12:00',
                'jumlah_tamu' => 4,
                'luas' => 14,
                'tipe_kasur' => 'Double',
                'fasilitas' => 'Shampoo, Free Toiletries, Slippers, Shower Gel',
                'smoking' => False,
                'rekomendasi' => False,
                'created_at' => '2025-11-01 08:35:27',
                'updated_at' => '2025-11-01 08:35:27',
            ],
            [
                'gambar' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/t_htl-dskt/tix-hotel/images-web/2023/06/05/5daf2016-7b7f-4684-a4d5-0aa7e28b7080-1685960936856-59e378843028e446392541a4a440a0a4.jpg',
                'tipe' => 'Super Deluxe Room (VC-3)',
                'deskripsi' => 'Glamping super deluxe riverside with private bathroom.',
                'harga_asli' => 1034327,
                'harga_diskon' => 899414,
                'checkin' => '14:00-21:00',
                'checkout' => '12:00',
                'jumlah_tamu' => 2,
                'luas' => 22,
                'tipe_kasur' => 'King',
                'fasilitas' => 'Patio or terrace, Private Bathroom, Shampoo, Free Toiletries, Hot Cold Shower, Slippers, Shower Gel, Shower, Separate Living Room, Balcony, Chair, Electric Kettle',
                'smoking' => False,
                'rekomendasi' => true,
                'created_at' => '2025-11-01 10:41:13',
                'updated_at' => '2025-11-01 10:41:13',
            ],
            [
                'gambar' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/t_htl-dskt/tix-hotel/images-web/2023/12/29/15d868a5-7559-40e9-b364-bba2a7ede545-1703816130351-bce4777b705c11c645430da191e95476.jpg',
                'tipe' => 'Familly Room (FR-1)',
                'deskripsi' => 'This room is intended for families. has one large king size bed and a soda bed.',
                'harga_asli' => 1483571,
                'harga_diskon' => null,
                'checkin' => '14:00-21:00',
                'checkout' => '12:00',
                'jumlah_tamu' => 4,
                'luas' => 38,
                'tipe_kasur' => 'Sofa, King',
                'fasilitas' => 'Stovetop, Patio or terrace, Private Bathroom, Shampoo, Free Toiletries, Hot Cold Shower',
                'smoking' => False,
                'rekomendasi' => False,
                'created_at' => '2025-11-01 11:17:29',
                'updated_at' => '2025-11-01 11:17:29',
            ],
        ]);

        Faq::insert([
            [
                'pertanyaan' => 'Berapa kisaran harga kamar untuk menginap di Villa dan Cafe Air Luwihajahill?',
                'jawaban' => 'Harga termurah di Villa dan Cafe Air Luwihajahill kalau kamu mau menginap mulai dari Rp. 600.000',
            ],
            [
                'pertanyaan' => 'Di mana alamat Villa dan Cafe Air Luwihajahill?',
                'jawaban' => 'Villa dan Cafe Air Luwihajahill beralamat di Jl. Tegal Luhur, Paseban, Kec. Megamendung, Kabupaten Bogor, Jawa Barat 16770',
            ],
            [
                'pertanyaan' => 'Pukul berapa waktu check-in & check-out di Villa dan Cafe Air Luwihajahill?',
                'jawaban' => 'Waktu untuk check-in di Villa dan Cafe Air Luwihajahill adalah mulai dari pukul 14:00-21:00 dan waktu check-out paling lambat pukul 12:00',
            ]
        ]);

        User::insert([
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'telepon' => '08123456789',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        ]);
    }
}
