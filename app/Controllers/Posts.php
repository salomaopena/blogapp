<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\IdCodec;
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


    public function editar(string $hash)
    {
        $post = $this->buscarPorHash($hash);

        return view('admin/posts/form', ['post' => $post]);
    }


    public function atualizar(string $hash)
    {
        $post = $this->buscarPorHash($hash);
        $model = new PostModel();
        $ok = $model->update($post['id'], [
            'titulo' => $this->request->getPost('titulo'),
            'conteudo' => $this->request->getPost('conteudo'),
            'publicado' => (int) $this->request->getPost('publicado'),
        ]);

        if (!$ok) {
            return redirect()->back()->withInput()->with('erros', $model->errors());
        }
        return redirect()->to('admin/posts')->with('msg', 'Post atualizado com sucesso');
    }


    public function apagar(string $hash)
    {
        $post = $this->buscarPorHash($hash);
        (new PostModel())->delete($post['id']);
        return redirect()->to('admin/posts')->with('msg', 'Post apagado com sucesso!');
    }


    private function buscarPorHash(string $hash): array
    {
        $id = IdCodec::decode($hash);
        $post = $id === null ? null : (new PostModel())->find($id);
        if ($post === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return $post;
    }

}



