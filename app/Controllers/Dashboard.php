<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\Shield\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('admin/dashboard',
            [
                'titulo' => 'Painel',
                'totalPosts' => (new PostModel())->countAllResults(),
                'totalUsuarios' => (new UserModel())->countAllResults(),
            ]
        );
    }
}
