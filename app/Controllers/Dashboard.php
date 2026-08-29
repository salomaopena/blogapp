<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\Shield\Models\UserModel;
use App\Models\NotificacaoModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view(
            'admin/dashboard',
            [
                'titulo' => 'Painel',
                'totalPosts' => (new PostModel())->countAllResults(),
                'totalUsuarios' => (new UserModel())->countAllResults(),
                'naoLidas' => (new NotificacaoModel())->naoLidasDe(auth()->id())
            ]
        );
    }

    public function notificacoes()
    {
        $model = new NotificacaoModel();
        $lista = $model->where('user_id', auth()->id())->orderBy('created_at', 'DESC')->findAll();
        $model->where('user_id', auth()->id())->set(['lida_em' => date('Y-m-d H:i:s')])->update();
        return view('admin/notificacoes', ['titulo' => 'Notificações', 'lista' => $lista]);
    }


}
