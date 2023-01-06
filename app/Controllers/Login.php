<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\RightsModel;
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

        $rights = $this->grabRights($user['ID_typu_konta']);

        session_start();
        $_SESSION['loggedIn'] = "yes";
        $_SESSION['userName'] = $user['Name'];
        $_SESSION['userEmail'] = $user['Email'];
        $_SESSION['userID'] = $user['ID'];
        $_SESSION['rights'] = $rights;

        return redirect()->to(site_url());
    }

    /**
     * Sprawdza czy istnieje takie konto
     * Jesli tak - zwraca jego login, haslo i ID typu konta
     * Jesli nie, zwraca puste
     */
    private function checkLogin($login, $pPassword)
    {
        $model = new AccountModel();
        $user = $model->where('login', $login)->first();
        $passwordFromDB = $user['Haslo'];
        if (password_verify($pPassword, $passwordFromDB))
            return $user;
        else return null;
    }
    private function grabRights($acc_type)
    {
        if ($acc_type == 1) //jezeli typ konta = 1, wowczas to admin ktory ma zawsze wszystkie prawa
            return "headAdmin";

        $stringOfRights = ""; //string przechowujacy id wszystkich praw, np,: "1;2;3;4;5;" ; do odkodowania przy pomocy funkcji explode
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ID_uprawnienia FROM uprawnienia_typy WHERE ID_typy_kont = '$acc_type'");

        $results = $query->getResultArray();
        foreach ($results as $row)
            $stringOfRights .= $row['ID_uprawnienia'] . ";";

        return $stringOfRights;
    }
}
