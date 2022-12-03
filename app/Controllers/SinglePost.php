<?php

namespace App\Controllers;

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
            'postTitle' => $foundPost['Tytul'],
            'text' => $foundPost['Tekst'],
            'publicationDate' => $foundPost['Data_publikacji'],
            'picture' => "/images/ori1.jpg",
        ];
        return view("singlePost", $data);
    }

    public function grabPost($postID)
    {
        $model = new PostModel();
        $foundPost = $model->find($postID);

        return $foundPost;
    }
}
