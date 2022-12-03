<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Session\Session;

class Logout extends BaseController
{
    public function getIndex()
    {
        session_start();
        session_destroy();
        return redirect()->to(site_url());
    }
}
