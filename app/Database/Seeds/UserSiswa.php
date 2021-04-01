<?php namespace App\Database\Seeds;

class UserSiswa extends \CodeIgniter\Database\Seeder
{
     public function run()
     {
        $pass = password_hash('1234', PASSWORD_DEFAULT);

        $data = [
            'idUniq'       => 'UwbYufTCgsc',
            'nama'         => 'David',
            'nama_lengkap' => 'David Aprilio',
            'fotoprofile'  => 'boy.jpg',
            'JK'           => 'L',
            'tgl_lahir'    => '14-04-2004',
            'kelas'        => '12 TKJ 2',
            'alamat'       => 'Ds. Getas, Kec. Tanjunganom',
            'pass'         => $pass,
            'user'         => 'david123',
            'email'         => 'david@mail.com',
            'NISN'         => '0123546789'
        ];

        // Using Query Builder
        $this->db->table('siswa')->insert($data);
     }
}