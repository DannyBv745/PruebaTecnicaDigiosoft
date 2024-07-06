<?php

namespace App\Models;

use CodeIgniter\Model;

class EditorialModel extends Model
{
    protected $table            = 'editorial';
    protected $primaryKey       = 'ed_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ed_nombre', 'ed_ubicacion'];

    // Dates
    protected $useTimestamps = false;
}
