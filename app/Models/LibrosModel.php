<?php

namespace App\Models;

use CodeIgniter\Model;

class LibrosModel extends Model
{
    protected $table            = 'libros';
    protected $primaryKey       = 'li_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['li_titulo', 'li_isbn', 'li_autor', 'li_editorial', 'li_idioma', 'li_categoria', 'li_numejemplares'];

    // Dates
    protected $useTimestamps = false;

    //consultas
    public function LibrosAutores()
    {
        return $this -> select('libros.*, autores.au_nombre AS autor, autores.au_apaterno AS apaterno, autores.au_amaterno AS amaterno')
                     -> join('autores', 'libros.li_autor = autores.au_id')
                     -> findAll();
    }

    public function LibrosEditoriales()
    {
        return $this -> select('libros.*, editorial.ed_nombre AS editorial')
                     -> join('editorial', 'libros.li_editorial = editorial.ed_id')
                     -> findAll();
    }

    public function LibrosIdiomas()
    {
        return $this -> select('libros.*, idiomas.idi_nombre AS idioma')
                     -> join('idiomas', 'libros.li_idioma = idiomas.idi_id')
                     -> findAll();
    }

    public function LibrosCategorias()
    {
        return $this -> select('libros.*, categorias.cat_nombre AS categoria')
                     -> join('categorias', 'libros.li_categoria = categorias.cat_id')
                     -> findAll();
    }
}
