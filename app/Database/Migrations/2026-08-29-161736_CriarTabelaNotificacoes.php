<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaNotificacoes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>
                [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'mensagem' => [
                'type' => 'TEXT'
            ],
            'lida_em' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('notificacoes');
    }

    public function down()
    {
        $this->forge->dropTable('notificacoes');
    }
}
