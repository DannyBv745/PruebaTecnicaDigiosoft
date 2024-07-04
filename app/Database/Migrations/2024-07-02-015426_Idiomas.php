<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Idiomas extends Migration
{
    // creacion de las columnas de las tablas para la base de datos
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

        //creacion de la tabla y llaves primarias
        $this -> forge -> addKey('idi_id', true);
        $this -> forge -> createTable('idiomas');

    }

    public function down()
    {
        $this -> forge -> dropTable('idiomas');
    }
}
