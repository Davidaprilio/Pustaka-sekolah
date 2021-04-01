<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriT extends Migration
{
	public function up()
   	{
        $this->db->disableForeignKeyChecks();
    	$this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'page'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'kat_grub'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '60',
            ],
            'kat_menu'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '60',
            ],
            'slugID'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ]
    	]);
    	$this->forge->addKey('id', true);
    	$this->forge->createTable('kategoriT');
        $this->db->enableForeignKeyChecks();
   	}

    public function down()
    {
        $this->forge->dropTable('kategoriT');
    }
}
