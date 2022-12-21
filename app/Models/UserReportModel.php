<?php

namespace App\Models;

use CodeIgniter\Model;

class UserReportModel extends Model
{
    protected $table      = 'uwagi_uzytkownikow';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID', 'ID_uzytkownika', 'Tekst', 'Data'];

    protected $useTimestamps = true;
    protected $createdField  = 'Data';
    protected $updatedField  = 'Updated_at';
    protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
