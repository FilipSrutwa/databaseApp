<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostModel;

class SinglePost extends BaseController
{
    public function getIndex()
    {
        return view("wrongData");
    }

    public function getPost($postID)
    {
        $foundPost = $this->grabPost($postID);
        $data = [
            'postID' => $postID,
            'postTitle' => $foundPost['Tytul'],
            'text' => $foundPost['Tekst'],
            'publicationDate' => $foundPost['Data_publikacji'],
            'picture' => "/images/ori1.jpg",
            'comments' => $this->grabComments($postID)
        ];
        return view("singlePost", $data);
    }

    public function postPost($postID) //dodanie komentarza
    {
        $comment = new CommentModel();
        $dataToSave = [
            'Tekst' => $_POST['pText'],
            'ID_autora' => $_POST['pCommenterID'],
            'ID_postu' => $postID
        ];
        $comment->save($dataToSave);

        return redirect()->to('SinglePost/' . $_POST['pPostID'] . '');
    }

    public function grabPost($postID)
    {
        $model = new PostModel();
        $foundPost = $model->find($postID);

        return $foundPost;
    }

    public function grabComments($postID)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT konta.Name AS Author, komentarze.Tekst AS CommentText, komentarze.Created_at AS CreatedAt FROM komentarze INNER JOIN konta ON konta.ID = ID_autora WHERE komentarze.Deleted_at IS NULL AND ID_postu = ?", $postID);

        $comments = $query->getResultArray();

        return $comments;
    }
}
