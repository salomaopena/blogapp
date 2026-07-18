<?= $this->extend('layouts/site') ?>
<?= $this->section('conteudo') ?>

<div class="container py-5" style="max-width: 440px">
    <div class="card card-post p-4 p-md-5 mt-4">
        <h1 class="fs-2 text-center mb-1">Entrar</h1>
        <p class="text-secondary text-center mb-4">Bem-vindo de volta.</p>

        <?php if (session('error')): ?>
            <div class="alert alert-danger"><?= esc(session('error')) ?></div>
        <?php endif ?>

        <form action="<?= url_to('login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">E-mail</label>
                <input type="email" name="email" class="form-control form-control-lg" value="<?= old('email') ?>"
                    placeholder="voce@exemplo.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Senha</label>
                <input type="password" name="password" class="form-control form-control-lg" required>
            </div>
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Continuar conectado</label>
            </div>
            <button class="btn btn-brand w-100 py-2">Entrar</button>
        </form>
        <p class="text-center text-secondary mt-4 mb-0">
            Não tem conta? <a href="<?= url_to('register') ?>"
                class="text-danger fw-semibold text-decoration-none">Criar conta</a>
        </p>
    </div>
</div>

<?= $this->endSection() ?>