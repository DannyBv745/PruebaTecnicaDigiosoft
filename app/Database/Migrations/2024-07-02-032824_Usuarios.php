<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            'us_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'us_user' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],

            'us_password' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'us_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],

            'us_apaterno' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],

            'us_amaterno' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],

            'us_telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],

            'us_email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

            'us_direccion' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this -> forge -> addKey('us_id', true);
        $this -> forge -> createTable('usuarios');
        }

    public function down()
    {
        $this -> forge -> dropTable('usuarios');
    }
}
