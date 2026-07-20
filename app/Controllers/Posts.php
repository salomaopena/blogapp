<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;

class Posts extends BaseController
{
    public function index()
    {
        return view('admin/posts/index', [
            'posts' => (new PostModel())->findAll()
        ]);
    }

    public function criar()
    {
        $model = new PostModel();
        $dados = [
            'author_id' => auth()->id(),
            'titulo' => $this->request->getPost('titulo'),
            'slug' => url_title($this->request->getPost('titulo'), '-', true),
            'conteudo' => $this->request->getPost('conteudo'),
            'publicado' => (int) $this->request->getPost('publicado'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if (!$model->insert($dados)) {
            return redirect()->back()->withInput()->with('erros', $model->errors());
        }

        return redirect()->to('admin/posts')->with('msg', 'Post criado com sucesso!');
    }

    public function novo()
    {
        return view('admin/posts/form', ['post' => []]);
    }
}



