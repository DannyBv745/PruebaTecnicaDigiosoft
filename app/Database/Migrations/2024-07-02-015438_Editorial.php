<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Editorial extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            'ed_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'ed_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'ed_ubicacion' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this -> forge -> addKey('ed_id', true);
        $this -> forge -> createTable('editorial');

    }

    public function down()
    {
        $this -> forge -> dropTable('editorial');
    }
}
