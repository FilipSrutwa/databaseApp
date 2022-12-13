<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Session\Session;

class Login extends BaseController
{
    public function getIndex()
    {
        return view("loginPage");
    }
    public function postIndex()
    {
        $user = $this->checkLogin($_POST['pLogin'], $_POST['pPassword']);
        if (empty($user)) {
            $data = [
                'wrongPassword' => 'true',
            ];

            return view("loginPage", $data);
        }

        session_start();
        $_SESSION['loggedIn'] = "yes";
        $_SESSION['userName'] = $user['Name'];
        $_SESSION['userEmail'] = $user['Email'];
        $_SESSION['userID'] = $user['ID'];
        return redirect()->to(site_url());
    }

    /**
     * Sprawdza czy istnieje takie konto
     * Jesli tak - zwraca jego login, haslo i ID typu konta
     * Jesli nie, zwraca puste
     */
    private function checkLogin($login, $password)
    {
        $model = new AccountModel();
        $user = $model->where('login', $login)->where('haslo', $password)->first();

        return $user;
    }
}
