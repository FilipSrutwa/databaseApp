<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Session\Session;

class PendingPosts extends BaseController
{
    public function getIndex()
    {
        $data = [
            'title' => 'OriFandom - Pending Posts',
            'pendingPosts' => $this->grabPendingPosts(),
        ];

        return view("pendingPostsPage", $data);
    }

    public function getSinglePost($postID)
    {
        $data = [
            'title' => 'OriFandom - Pending Post',
            'pendingPost' => $this->grabPendingPost($postID),
        ];

        return view("pendingPostPage", $data);
    }

    public function postSinglePost($postID)
    {
        //napisz metode, ktora zapisuje ten post do postow widocznych
    }

    private function grabPendingPosts()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT posty_oczekujace.ID AS ID, tematy_postow.Temat AS Temat, Tytul, Tekst, konta.Name AS Author_name, ID_temat, ID_autora FROM posty_oczekujace INNER JOIN konta ON konta.ID = ID_autora INNER JOIN tematy_postow ON tematy_postow.ID = ID_temat');
        $results = $query->getResultArray();

        return $results;
    }

    private function grabPendingPost($postID)
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT posty_oczekujace.ID AS ID, tematy_postow.Temat AS Temat, Tytul, Tekst, konta.Name AS Author_name, ID_temat, ID_autora FROM posty_oczekujace INNER JOIN konta ON konta.ID = ID_autora INNER JOIN tematy_postow ON tematy_postow.ID = ID_temat WHERE posty_oczekujace.ID = ?';
        $query = $db->query($sql, $postID); //wstaw $postID pod znak zapytania w sql
        $result = $query->getRow();

        return $result;
    }
}
