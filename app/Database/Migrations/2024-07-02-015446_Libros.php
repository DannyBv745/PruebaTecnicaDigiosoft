<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Libros extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            'li_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'li_titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'li_isbn' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
            ],

            'li_autor' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'li_editorial' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'li_idioma' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'li_categoria' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'li_numejemplares' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this -> forge -> addKey('li_id', true);
        $this -> forge -> addForeignKey('li_autor', 'autores', 'au_id');
        $this -> forge -> addForeignKey('li_editorial', 'editorial', 'ed_id');
        $this -> forge -> addForeignKey('li_idioma', 'idiomas', 'idi_id');
        $this -> forge -> addForeignKey('li_categoria', 'categorias', 'cat_id');
        $this -> forge -> createTable('libros');

    }

    public function down()
    {
        $this -> forge -> dropTable('libros');
    }
}
