<?php namespace App\Database\Seeds;

class ApiClientApps extends \CodeIgniter\Database\Seeder
{
     public function run()
     {
        $data = [
            'nameApp'    => 'Pustaka',
            'keyClient'  => 'CVsg34T7MCHn8NG7BkajbUV79dga98',
            'author'     => 'David aprilio',
            'used'       => 'Project UKK PKK',
            'active'     => 1
        ];
        $this->db->table('clientapps')->insert($data);
     }
}