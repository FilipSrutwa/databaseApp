<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\PostModel;
use App\Models\PendingPostModel;
use CodeIgniter\Session\Session;
use DateTime;

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

    public function getSinglePost($postID) //wyswietlenie pojedynczego postu oczekujacego na zapisanie
    {
        $data = [
            'title' => 'OriFandom - Pending Post',
            'pendingPost' => $this->grabPendingPost($postID),
        ];

        return view("pendingPostPage", $data);
    }

    public function postSinglePost($postID) //zapisanie pojedynczego postu do opublikowanych postow
    {
        $date = date("Y-m-d");
        $pendingPost = new PendingPostModel();

        $post = new PostModel();
        $dataToSave = [
            'ID_autora' => $_POST['pAuthorID'],
            'Temat_postu' => $_POST['pTopicID'],
            'Tytul' => $_POST['pTitle'],
            'Tekst' => $_POST['pText'],
            'Data_publikacji' => $date,
            'ID_admina' => $_POST['pAdminID']
        ];

        $post->save($dataToSave);
        $pendingPost->delete($postID); //usuniecie z postow oczekujacych

        $data = [
            'title' => 'OriFandom - Pending Posts',
            'pendingPosts' => $this->grabPendingPosts(),
        ];

        return view("pendingPostsPage", $data);
    }

    private function grabPendingPosts()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT posty_oczekujace.ID AS ID, tematy_postow.Temat AS Temat, Tytul, Tekst, konta.Name AS Author_name, ID_temat, ID_autora FROM posty_oczekujace INNER JOIN konta ON konta.ID = ID_autora INNER JOIN tematy_postow ON tematy_postow.ID = ID_temat WHERE posty_oczekujace.Deleted_at IS NULL');
        $results = $query->getResultArray();

        return $results;
    }

    private function grabPendingPost($postID)
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT posty_oczekujace.ID AS ID, tematy_postow.Temat AS Temat, Tytul, Tekst, konta.Name AS Author_name, ID_temat, ID_autora FROM posty_oczekujace INNER JOIN konta ON konta.ID = ID_autora INNER JOIN tematy_postow ON tematy_postow.ID = ID_temat WHERE posty_oczekujace.ID = ? AND posty_oczekujace.Deleted_at IS NULL';
        $query = $db->query($sql, $postID); //wstaw $postID pod znak zapytania w sql
        $result = $query->getRow();

        return $result;
    }
}
