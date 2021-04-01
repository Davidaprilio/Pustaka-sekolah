<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
   	{
   		$this->db->disableForeignKeyChecks();
    	$this->forge->addField([
            'id'    => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'idUniq'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nama'  => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'kelas'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
            ],
            'jk'    => [
                'type'           => 'CHAR',
                'constraint'     => '1',
            ],
            'readTime'   => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'readTimeAVGperDay' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'bookColection' => [
                'type'           => 'TEXT',
                'NULL'           => TRUE,
            ],
            'bookRead' => [
                'type'           => 'TEXT',
                'NULL'           => TRUE,
            ],
            'favoriteBook'  => [
                'type'           => 'TEXT',
                'NULL'           => TRUE,
            ],
            'updated_at'    => [
                'type'           => 'DATETIME',
            ],
            'created_at'    => [
                'type'           => 'DATETIME',
            ]
    	]);
    	$this->forge->addKey('id', true);
    	$this->forge->createTable('user');
		$this->db->enableForeignKeyChecks();
   	}

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
