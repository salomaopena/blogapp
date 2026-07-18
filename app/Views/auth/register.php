<?= $this->extend('layouts/site') ?>
<?= $this->section('conteudo') ?>
<div class="container py-5" style="max-width: 440px">
    <div class="card card-post p-4 p-md-5 mt-4">
        <h1 class="fs-2 text-center mb-1">Criar conta</h1>
        <p class="text-secondary text-center mb-4">Leva menos de um minuto.</p>

        <?php if (session('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ((array) session('errors') as $erro): ?>
                        <li><?= esc($erro) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= url_to('register') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nome de utilizador</label>
                <input type="text" name="username" 
                class="form-control form-control-lg" value="<?= old('username') ?>"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">E-mail</label>
                <input type="email" name="email" class="form-control form-control-lg" value="<?= old('email') ?>"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Senha</label>
                <input type="password" name="password" class="form-control form-control-lg" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Confirmar senha</label>
                <input type="password" name="password_confirm" class="form-control form-control-lg" required>
            </div>
            <button class="btn btn-brand w-100 py-2">Criar conta</button>
        </form>
        <p class="text-center text-secondary mt-4 mb-0">
            Já tem conta? <a href="<?= url_to('login') ?>"
                class="text-danger fw-semibold text-decoration-none">Entrar</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>