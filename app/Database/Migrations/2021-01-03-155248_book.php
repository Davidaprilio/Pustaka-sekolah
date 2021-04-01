<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
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
            'file_enc'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'slug_buku'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'author'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'judul_buku'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'penulis'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'penerbit'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'sampul'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'kategori'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'forClass'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'type'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ],
            'deskripsi'       => [
                'type'           => 'TEXT',
                'constraint'     => '255',
            ],
            'download'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'reader'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'rating'       => [
                'type'           => 'INT',
                'constraint'     => 1,
            ],
            'updated_at' => [
                'type'           => 'DATE'
            ],
            'created_at' => [
                'type'           => 'DATE'
            ]
    	]);
    	$this->forge->addKey('id', true);
    	$this->forge->createTable('book');
        $this->db->enableForeignKeyChecks();
   	}

    public function down()
    {
        $this->forge->dropTable('book');
    }
}