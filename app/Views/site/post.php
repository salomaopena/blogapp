<?= $this->extend('layouts/site') ?>
<?= $this->section('conteudo') ?>
<div class="container py-5">
    <article class="col-lg-8 mx-auto">
        <a href="<?= site_url('/') ?>" class="text-decoration-none text-secondary">
            <i class="bi bi-arrow-left me-1"></i>Voltar
        </a>
        <h1 class="display-5 mt-3"><?= esc($post['titulo']) ?></h1>
        <p class="text-secondary mb-4">
            <i class="bi bi-calendar3 me-1"></i><?= esc(date('d/m/Y H:i', strtotime($post['created_at']))) ?>
        </p>
        <div class="fs-5" style="line-height: 1.8"><?= nl2br(esc($post['conteudo'])) ?></div>
    </article>
</div>
<?= $this->endSection() ?>