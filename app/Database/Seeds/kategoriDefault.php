<?php namespace App\Database\Seeds;

class kategoriDefault extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'kat_grub' => 'Buku Kelas',
                'kat_menu' => 'Semua Buku',
                'slugID' => 'SemuaBuku@kbaduaBUdGd'
            ],
            [
                'kat_grub' => 'Buku Kelas',
                'kat_menu' => 'Buku Kelas 12',
                'slugID' => 'BukuKelas12@IbBibfiKUbifhi'
            ],
            [
                'kat_grub' => 'Buku Kelas',
                'kat_menu' => 'Buku Kelas 11',
                'slugID' => 'BukuKelas11@JBfiifvuUVKuf'
            ],
            [
                'kat_grub' => 'Buku Kelas',
                'kat_menu' => 'Buku Kelas 10',
                'slugID' => 'BukuKelas10@IHifhiLwKGwn'
            ],
            [
                'kat_grub' => 'Buku Produktif',
                'kat_menu' => 'TKJ',
                'slugID' => 'TKJ@LUgufgwVufGUifb'
            ],
            [
                'kat_grub' => 'Buku Produktif',
                'kat_menu' => 'MM',
                'slugID' => 'MM@ihIgflGKdhalihf'
            ],
            [
                'kat_grub' => 'Buku Produktif',
                'kat_menu' => 'TKR',
                'slugID' => 'TKR@IfbSkfnJdfKdaa'
            ],
            [
                'kat_grub' => 'Buku Produktif',
                'kat_menu' => 'TBO',
                'slugID' => 'TBO@fbuwBBbwufKfen'
            ],
            [
                'kat_grub' => 'Buku Produktif',
                'kat_menu' => 'TPL',
                'slugID' => 'TPL@giNIgeoanINifwn'
            ],
            [
                'kat_grub' => 'Buku Produktif',
                'kat_menu' => 'APAT',
                'slugID' => 'APAT@IhfwiUGfohwihi'
            ],
        ];
        
        foreach ($data as $get) {
            $this->db->table('kategoriT')->insert($get);
        }
    }
}