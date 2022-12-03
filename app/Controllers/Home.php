<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'OriFandom - Home',
        ];
        return view("landingPage", $data);
    }
}
