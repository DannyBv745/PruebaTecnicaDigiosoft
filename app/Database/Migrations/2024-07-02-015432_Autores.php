<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Autores extends Migration
{
    // creacion de las columnas de las tablas para la base de datos
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

        //creacion de la tabla y llaves primarias
        $this -> forge -> addKey('au_id', true);
        $this -> forge -> createTable('autores');

    }

    public function down()
    {
        $this -> forge -> dropTable('autores');
    }
}
