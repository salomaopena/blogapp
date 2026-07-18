<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($titulo ?? 'Blog App') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800&family=Inter:wght@400;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg fixed-top navbar-glass">
        <div class="container" style="max-width: 1080px">
            <a class="navbar-brand" href="<?= site_url('/') ?>">
                <i class="bi bi-journal-richtext text-danger me-1"></i>Blog App
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="nav">
                <ul class="navbar-nav align-items-lg-center gap-lg-2">
                    <?php if (auth()->loggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?= site_url('admin') ?>">
                                Painel</a>
                        </li>
                        <li class="nav-item"><a class="btn btn-sm btn-outline-dark rounded-pill px-3"
                                href="<?= site_url('logout') ?>">Sair</a></li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?= site_url('register') ?>">
                                Criar
                                conta</a>
                        </li>
                        <li class="nav-item"><a class="btn btn-sm btn-dark rounded-pill px-3"
                                href="<?= site_url('login') ?>">Entrar</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1" style="padding-top:72px;">
        <?= $this->renderSection('conteudo') ?>
    </main>

    <footer class="py-4 mt-auto">
        <div class="container d-flex flex-wrap justify-content-between" style="max-width: 1080px">
            <span><i class="bi bi-journal-richtext me-1"></i>Blog App</span>
            <span>Feito com CodeIgniter 4 + Shield</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>