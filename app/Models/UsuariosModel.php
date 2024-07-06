<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'us_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['us_user', 'us_password', 'us_nombre', 'us_apaterno', 'us_amaterno', 'us_telefono', 'us_email', 'us_direccion'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';

}
