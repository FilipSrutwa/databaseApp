<?php

namespace App\Models;

use CodeIgniter\Model;

class PendingPostModel extends Model
{
    protected $table      = 'posty_oczekujace';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID', 'ID_temat', 'Tytul', 'Tekst', 'ID_autora'];

    protected $useTimestamps = true;
    protected $createdField  = 'Created_at';
    protected $updatedField  = 'Updated_at';
    protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
