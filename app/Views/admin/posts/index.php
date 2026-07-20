<?= $this->extend('layouts/admin') ?>
<?= $this->section('conteudo') ?>

<div class="d-flex align-items-center mb-4">
    <h1 class="fs-3 mb-0">Posts</h1>
    <a class="btn btn-danger ms-auto" href="<?= site_url('admin/posts/novo') ?>">
        <i class="bi bi-plus-lg me-1"></i>Novo post
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Título</th>
                    <th>Estado</th>
                    <th>Criado em</th>
                    <th class="text-end pe-4">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($posts === []): ?>
                    <tr>
                        <td colspan="4" class="text-center text-secondary py-5">
                            Nenhum post ainda. Crie o primeiro!</td>
                    </tr>
                <?php endif ?>
                <?php foreach ($posts as $post): ?>
                    <?php $hash = \App\Libraries\IdCodec::encode((int) $post['id']); ?>
                    <tr>
                        <td class="ps-4 fw-semibold"><?= esc($post['titulo']) ?></td>
                        <td>
                            <?php if ($post['publicado']): ?>
                                <span class="badge text-bg-success">Publicado</span>
                            <?php else: ?>
                                <span class="badge text-bg-secondary">Rascunho</span>
                            <?php endif ?>
                        </td>
                        <td class="text-secondary"><?= esc(date('d/m/Y', strtotime($post['created_at']))) ?>
                        </td>
                        <td class="text-end pe-4">
                            <a class="btn btn-sm btn-outline-secondary" href="<?= site_url('admin/posts/editar/' . $hash) ?>">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="post" action="<?= site_url('admin/posts/apagar/' . $hash) ?>" class="d-inline">
                                <?= csrf_field() ?>
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Apagar este post?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>