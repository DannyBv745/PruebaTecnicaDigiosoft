<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Idiomas extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            'idi_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'idi_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],

            'idi_abreviacion' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
            ],
        ]);

        $this -> forge -> addKey('idi_id', true);
        $this -> forge -> createTable('idiomas');

    }

    public function down()
    {
        $this -> forge -> dropTable('idiomas');
    }
}
