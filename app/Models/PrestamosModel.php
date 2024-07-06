<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestamosModel extends Model
{
    protected $table            = 'prestamos';
    protected $primaryKey       = 'pr_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pr_prestamo', 'pr_devolucion', 'pr_usuario', 'pr_ejemplar'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';

    //consultas
    public function PrestamosUsuarios()
    {
        return $this -> select('prestamos.*, usuarios.us_user AS user')
                     -> join('usuarios', 'prestamos.pr_id = usuarios.us_id')
                     -> findAll();
    }
}
