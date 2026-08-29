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
                $this->enviarEmail($user->email, $titulo, $mensagem);
            }
        }
    }

    private function enviarEmail(string $para, string $assunto, string $corpo): void
    {
        $email = service('email');
        $email->setTo($para);
        $email->setSubject($assunto);
        $email->setMessage(view('emails/notificacao', ['mensagem' => $corpo]));

        if (!$email->send(false)) {
            log_message('error', 'Falha ao enviar e-mail ' . $email->printDebugger(['headers']));
        }
    }
}