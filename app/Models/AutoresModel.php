<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoresModel extends Model
{
    protected $table            = 'autores';
    protected $primaryKey       = 'au_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['au_nombre', 'au_apaterno', 'au_amaterno'];

    // Dates
    protected $useTimestamps = false;
 
}
