<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorias extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            'cat_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true, 
            ],
            
            'cat_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
          ]);

          $this -> forge -> addKey('cat_id', true);
          $this -> forge -> createTable('categorias');


    }

    public function down()
    {
          $this -> forge -> dropTable('categorias');
    }
}
