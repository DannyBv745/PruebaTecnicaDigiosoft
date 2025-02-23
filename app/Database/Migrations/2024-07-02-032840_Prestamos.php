<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prestamos extends Migration
{
    // creacion de las columnas de las tablas para la base de datos
    public function up()
    {
        $this -> forge -> addField([
            'pr_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'pr_prestamo' => [
                'type' => 'DATE',
            ],

            'pr_devolucion' => [
                'type' => 'DATE',
            ],

            'pr_usuario' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'pr_ejemplar' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        //creacion de la tabla, llaves primarias y foraneas
        $this -> forge -> addKey('pr_id', true);
        $this -> forge -> addForeignKey('pr_usuario', 'usuarios', 'us_id');
        $this -> forge -> addForeignKey('pr_ejemplar', 'ejemplares', 'ej_id');
        $this -> forge -> createTable('prestamos');
    }

    public function down()
    {
        $this -> forge -> dropTable('prestamos');
    }

}
