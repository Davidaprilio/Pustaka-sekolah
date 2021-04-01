<?php namespace App\Database\Seeds;

class system extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'keyword' => 'themeAdmin',
            'value' => 'dark',
        ];
        $this->db->table('system')->insert($data);
    }
}