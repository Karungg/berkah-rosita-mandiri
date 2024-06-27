<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdukTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'harga' => [
                'type' => 'INT',
            ],
            'stok' => [
                'type' => 'INT'
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
