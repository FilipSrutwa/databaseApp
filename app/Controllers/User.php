<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Session\Session;

use function PHPUnit\Framework\throwException;

class User extends BaseController
{
    public function getIndex()
    {
        return view("userPage");
    }

    public function getChangePassword()
    {
        return view("changePassword");
    }


    public function postChangePassword()
    {
        $user = new AccountModel();
        $foundUser = $user->where('ID', $_POST['pID'])->first();
        $checkPassword = password_verify($_POST['pPassword'], $foundUser['Haslo']);
        if (!$checkPassword) {
            $data = [
                'wrongPassword' => 'true',
            ];

            return view("changePassword", $data);
        } else {
            $data = [
                'Haslo' => password_hash($_POST['pNewPassword'], PASSWORD_DEFAULT),
            ];
            $user->update($_POST['pID'], $data);
        }

        return view("userPage");
    }

    public function getDeleteUser($userID)
    {
        $user = new AccountModel();
        $foundUser = $user->where('ID', $userID);
        if ($foundUser != null) {
            $foundUser->delete();
            session_destroy();
            return redirect()->to(site_url());
        } else {
            return view("errorPage");
        }
    }
}
