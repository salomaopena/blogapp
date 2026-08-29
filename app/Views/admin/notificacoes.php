<?= $this->extend('layouts/admin') ?>
<?= $this->section('conteudo') ?>

<h1 class="fs-3 mb-4">Notificações</h1>

<div class="card">
    <ul class="list-group list-group-flush">
        <?php foreach ($lista as $n): ?>
            <li class="list-group-item d-flex gap-3 py-3">
                <div class="stat-icon text-bg-warning bg-opacity-10 text-warning"
                    style="width:42px;height:42px;font-size:1.1rem">
                    <i class="bi bi-bell"></i>
                </div>
                <div>
                    <div class="fw-semibold"><?= esc($n['titulo']) ?></div>
                    <div class="text-secondary"><?= esc($n['mensagem']) ?></div>
                    <small class="text-secondary"><i class="bi bi-clock me-1"></i>
                    <?= esc($n['created_at']) ?></small>
                </div>
            </li>
        <?php endforeach ?>
        <?php if ($lista === []): ?>
            <li class="list-group-item text-center text-secondary py-5">
                Nenhuma notificação por aqui.
            </li>
        <?php endif ?>
    </ul>
</div>
<?= $this->endSection() ?>