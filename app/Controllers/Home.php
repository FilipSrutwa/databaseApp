<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'OriFandom - Home',
            'posts' => $this->grabPosts(),
        ];

        return view("landingPage", $data);
    }

    private function grabPosts()
    {
        $model = new PostModel();
        $foundPosts = $model->findAll();

        return $foundPosts;
    }
}
