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
}
