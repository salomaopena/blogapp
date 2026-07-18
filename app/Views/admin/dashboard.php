<?= $this->extend('layouts/admin') ?>
<?= $this->section('conteudo') ?>

<h1 class="fs-3 mb-1">Painel</h1>
<p class="text-secondary mb-4">Bem-vindo,
    <strong><?= esc(auth()->user()->username ?? auth()->user()->email) ?></strong>.</p>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon text-bg-danger bg-opacity-10 text-danger">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold"><?= $totalPosts ?></div>
                    <div class="text-secondary small">Posts</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon text-bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-people"></i></div>
                <div>
                    <div class="fs-3 fw-bold"><?= $totalUsuarios ?></div>
                    <div class="text-secondary small">Utilizadores</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>