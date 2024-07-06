<?php

namespace App\Models;

use CodeIgniter\Model;

class IdiomasModel extends Model
{
    protected $table            = 'idiomas';
    protected $primaryKey       = 'idi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idi_nombre', 'idi_abreviacion'];

    // Dates
    protected $useTimestamps = false;
}
