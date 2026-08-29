<?php

namespace App\Services;
use App\Models\NotificacaoModel;
use CodeIgniter\Shield\Models\UserModel;


class NotificacaoService
{
    public function notificarAdmins(string $titulo, string $mensagem): void
    {
        $users = new UserModel();
        $notifs = new NotificacaoModel();

        foreach ($users->findAll() as $user) {
            if ($user->inGroup('admin')) {
                $notifs->insert([
                    'user_id' => $user->id,
                    'titulo' => $titulo,
                    'mensagem' => $mensagem
                ]);
            }
        }
    }
}