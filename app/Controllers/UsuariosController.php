<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Models\UserModel;

class UsuariosController extends BaseController
{
    public function index()
    {
        return view('admin/users/index', ['usuarios' => (new UserModel())->findAll()]);
    }

    public function papel($id)
    {
        $user = (new UserModel())->findById($id);
        $grupo = $this->request->getPost('grupo');

        if ($user !== null && in_array($grupo, ['admin', 'editor', 'member'], true)) {
            $user->syncGroups($grupo);
        }

        return redirect()->to('admin/usuarios')->with('msg', 'Papel de usuário atualizado com sucesso!');

    }
}
