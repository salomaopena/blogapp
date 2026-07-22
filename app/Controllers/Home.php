<?php

namespace App\Controllers;
use App\Libraries\IdCodec;
use App\Models\PostModel;

class Home extends BaseController
{
    public function index(): string
    {
        $posts = (new PostModel())->publicados();
        return view('site/home', ['posts' => $posts]);
    }

    public function post(string $hash)
    {
        $id = IdCodec::decode($hash);

        if ($id === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $post = (new PostModel())->find($id);

        if ($post === null || !$post['publicado']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('site/post', ['post' => $post]);
    }
}
