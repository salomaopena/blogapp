<?= $this->extend('layouts/admin') ?>
<?= $this->section('conteudo') ?>

<h1 class="fs-3 mb-4"><?= $post ? 'Editar post' : 'Novo post' ?></h1>

<div class="card col-lg-8 p-4">

    <?php if (session('erros')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session('erros') as $erro): ?>
                    <li>
                        <?= esc($erro) ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form method="post" action="<?= $post
        ? site_url('admin/posts/atualizar/' . \App\Libraries\IdCodec::encode((int) $post['id']))
        : site_url('admin/posts/criar') ?>">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label fw-semibold">Título</label>
            <input name="titulo" class="form-control form-control-lg" placeholder="Um título irresistível"
                value="<?= esc(old('titulo', $post['titulo'] ?? '')) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Conteúdo</label>
            <textarea name="conteudo" rows="10" class="form-control"
                placeholder="Escreva aqui..."><?= esc(old('conteudo', $post['conteudo'] ?? '')) ?>
            </textarea>
        </div>
        <div class="form-check form-switch mb-4">
            <input type="checkbox" role="switch" class="form-check-input" id="publicado" 
            name="publicado" value="1"
                <?= ($post['publicado'] ?? 0) ? 'checked' : '' ?>>
            <label class="form-check-label" for="publicado">Publicar imediatamente</label>
        </div>
        <button class="btn btn-danger px-4"><i class="bi bi-check-lg me-1"></i>Guardar</button>
        <a class="btn btn-light ms-2" href="<?= site_url('admin/posts') ?>">Cancelar</a>
    </form>
</div>
<?= $this->endSection() ?>