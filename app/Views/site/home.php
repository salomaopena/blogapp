<?= $this->extend('layouts/site') ?>
<?= $this->section('conteudo') ?>
<div class="hero">
    <div class="container">
        <h1>Ideias que valem <br> a pena ler</h1>
        <p class="lead mt-3">Um blog construído com CodeIgniter 4 + Shield</p>
        <a href="#posts" class="btn btn-brand mt-3">
            <i class="bi bi-arrow-down me-1"></i> Ler o blog
        </a>
    </div>
</div>

<div class="container pb-5" id="posts" style="max-width: 1080px;">
    <?php if ($posts === []): ?>
        <p class="text-center text-secondary py-5">Ainda não há posts publicados</p>
    <?php endif; ?>

    <div class="row g-4">
        <?php foreach ($posts as $post): ?>
            <div class="col-md-6 col-lg-4">
                <article class="card card-post h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <small class="text-secondary mb-2">
                            <i class="bi bi-calendar3 me-3"></i>
                            <?= esc(date('d/m/Y', strtotime($post['created_at']))) ?>
                        </small>
                        <h5 class="card-title"><?= esc($post['titulo']) ?></h5>
                        <p class="card-text text-secondary flex-grow-1">
                            <?= esc(character_limiter(strip_tags($post['conteudo']), 120)) ?>
                        </p>
                        <a href="<?= site_url('post/' . App\Libraries\IdCodec::encode((int) $post['id'])) ?>"
                            class="stretched-link fw-semibold text-danger text-decoration-none">
                            Ler mais <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection() ?>