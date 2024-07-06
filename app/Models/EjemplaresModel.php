<?php

namespace App\Models;

use CodeIgniter\Model;

class EjemplaresModel extends Model
{
    protected $table            = 'ejemplares';
    protected $primaryKey       = 'ej_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ej_libro', 'ej_numejemplar', 'ej_estatus'];

    // Dates
    protected $useTimestamps = false;
}
