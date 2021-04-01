<?php 
namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class dataReg extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
$kelas="10 TKJ 1,10 TKJ 2,10 TBO 1,10 TBO 2,10 TKR 1,10 TKR 2,10 MM 1,10 MM 2,10 APAT 1,10 APAT 2,10 TPL 1,10 TPL 2";

        $kelas = explode(",", $kelas);
        $faker = \Faker\Factory::create('id_ID');
        helper('text');
        for ($i=0; $i < 50; $i++) { 
            $gender = ( ($i%2) == 1 ) ? 'L' : 'P';
            $data = [
                'NISN' => '00'.random_string('numeric', 8),
                'Nama' => $faker->name,
                'Kelas' => $kelas[mt_rand(0, count($kelas)-1)],
                'JK' => $gender,
                'updated_at' => Time::createFromTimestamp($faker->unixTime()),
                'created_at' => Time::now(),
            ];
            $this->db->table('join_allow')->insert($data);
        }
    }
}