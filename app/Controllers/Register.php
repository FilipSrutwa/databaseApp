<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Session\Session;

use function PHPUnit\Framework\isEmpty;

class Register extends BaseController
{
    public function getIndex()
    {
        return view("registerPage");
    }
    public function postIndex()
    {
        $user = $this->saveModel($_POST['pLogin'], $_POST['pPassword'], $_POST['pEmail'], $_POST['pName']);
        if ($user == null) {
            $data = [
                'alreadyExists' => 'true',
            ];

            return view("registerPage", $data);
        }

        session_start();
        $_SESSION['loggedIn'] = "yes";
        $_SESSION['userName'] = $user->Name;

        return redirect()->to(site_url());
    }

    /**
     * Sprawdza czy mozna zalozyc konto,
     * jesli nie to nie zapisuje
     */
    private function saveModel($login, $pPassword, $email, $name)
    {
        $model = new AccountModel();
        $user = $model->where('login', $login)->first();

        if (!empty($user))
            return null;

        $password = password_hash($pPassword, PASSWORD_DEFAULT);

        $data = [
            'Login' => $login,
            'Haslo' => $password,
            'Email' => $email,
            'ID_typu_konta' => '3',
            'Name' => $name,
        ];
        $toSave = new AccountModel();
        $toSave->save($data);

        return $toSave;
    }
}
