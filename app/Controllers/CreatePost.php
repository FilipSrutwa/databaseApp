<?php

namespace App\Controllers;

use App\Models\TopicsModel;
use App\Models\PendingPostModel;
use DateTime;

class CreatePost extends BaseController
{
    public function getIndex()
    {
        $data = [
            'title' => 'OriFandom - Creating Post',
            'topics' => $this->grabTopics(),
        ];

        return view("createPostPage", $data);
    }
    public function postIndex()
    {
        $dataToSave = [
            'ID_temat' => $_POST['pTopicID'],
            'Tytul' => $_POST['pTitle'],
            'Tekst' => $_POST['pText'],
            'ID_autora' => $_POST['pAuthorID']
        ];
        $newPendingPost = new PendingPostModel();
        $newPendingPost->save($dataToSave);

        return redirect()->to(site_url());
    }

    private function grabTopics()
    {
        $topics = new TopicsModel();
        $foundTopics = $topics->findAll();

        return $foundTopics;
    }
}
