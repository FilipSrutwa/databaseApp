<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicsModel extends Model
{
    protected $table      = 'tematy_postow';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['ID', 'Temat'];

    //protected $useTimestamps = true;
    //protected $createdField  = 'Created_at';
    //protected $updatedField  = 'Updated_at';
    //protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
