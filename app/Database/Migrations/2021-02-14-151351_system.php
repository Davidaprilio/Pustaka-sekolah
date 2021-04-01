<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class System extends Migration
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
            'keyword'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'value'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '60',
            ]
    	]);
    	$this->forge->addKey('id', true);
    	$this->forge->createTable('system');
		$this->db->enableForeignKeyChecks();
   	}

    public function down()
    {
        $this->forge->dropTable('system');
    }
}