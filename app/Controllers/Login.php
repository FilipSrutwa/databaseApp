<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function getIndex()
    {
        return view("loginPage");
    }
    public function postIndex()
    {
        $user = $this->checkLogin($_POST['pLogin'], $_POST['pPassword']);
        if (empty($user))
            return view("wrongData");
        else {
            return redirect()->to("oriOne");
        }
    }

    /**
     * Sprawdza czy istnieje takie konto
     * Jesli tak - zwraca jego login, haslo i ID typu konta
     * Jesli nie, zwraca puste
     */
    private function checkLogin($login, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `Login`,`Haslo`,`ID_typu_konta` FROM konta INNER JOIN typy_kont ON typy_kont.ID = ID_typu_konta WHERE Login = '$login' AND Haslo = '$password'");
        $result = $query->getRow();

        return $result;
    }
}
