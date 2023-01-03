<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserReportFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        $arr = explode(";", $_SESSION['rights']);
        $found = 0;

        if ($_SESSION['rights'] == "headAdmin")
            $found =  1;
        else {
            foreach ($arr as $right) {
                if ($right == "1") {
                    $found = 1;
                    break;
                }
            }
        }

        if ($found == 0) {
            return redirect()->to(site_url());
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
