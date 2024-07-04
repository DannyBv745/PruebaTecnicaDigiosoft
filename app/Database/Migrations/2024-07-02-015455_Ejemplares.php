<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ejemplares extends Migration
{
    // creacion de las columnas de las tablas para la base de datos
    public function up()
    {
        $this -> forge -> addField([
            'ej_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'ej_libro' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'ej_numejemplar' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'ej_estatus' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => true,
            ],
        ]);

        //creacion de la tabla, llaves primarias y foraneas
        $this -> forge -> addKey('ej_id', true);
        $this -> forge -> addForeignKey('ej_libro', 'libros', 'li_id');
        $this -> forge -> createTable('ejemplares');

    }

    public function down()
    {
        $this -> forge -> dropTable('ejemplares');
    }
}
