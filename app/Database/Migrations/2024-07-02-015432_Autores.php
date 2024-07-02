<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Autores extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            'au_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'au_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],

            'au_apaterno' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],

            'au_amaterno' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
        ]);

        $this -> forge -> addKey('au_id', true);
        $this -> forge -> createTable('autores');

    }

    public function down()
    {
        $this -> forge -> dropTable('autores');
    }
}
