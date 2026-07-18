<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($titulo ?? 'Painel') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800&family=Inter:wght@400;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="bg-body-tertiary">

    <div class="d-flex">
        <aside class="sidebar offcanvas-lg offcanvas-start flex-shrink-0" tabindex="-1" id="menuAdmin">
            <div class="offcanvas-header d-lg-none pb-0">
                <span class="brand text-white fs-5"><i class="bi bi-journal-richtext text-danger me-1">

                </i>Blog App</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    data-bs-target="#menuAdmin"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column p-3">
                <a href="<?= site_url('admin') ?>"
                    class="brand text-white fs-5 text-decoration-none mb-3 d-none d-lg-block px-2">
                    <i class="bi bi-journal-richtext text-danger me-1"></i>Blog App
                </a>
                <ul class="nav nav-pills flex-column mb-auto gap-1">
                    <li><a class="nav-link <?= url_is('admin') ? 'active' : '' ?>" href="<?= site_url('admin') ?>">
                            <i class="bi bi-speedometer2 me-2"></i>Painel</a></li>
                    
                            <li><a class="nav-link <?= url_is('admin/posts*') ? 'active' : '' ?>"
                            href="<?= site_url('admin/posts') ?>">
                            <i class="bi bi-file-earmark-text me-2"></i>Posts</a></li>
                </ul>
                <hr class="text-secondary">
                <div class="d-flex align-items-center gap-2 px-2">
                    <div class="avatar">
                        <?= strtoupper(substr(auth()->user()->username ?? auth()->user()->email, 0, 1)) ?></div>
                    <div class="flex-grow-1 text-truncate">
                        <div class="text-white small fw-semibold">
                            <?= esc(auth()->user()->username ?? auth()->user()->email) ?></div>
                        <div class="text-secondary" style="font-size:.75rem">
                            <?= esc(implode(', ', auth()->user()->getGroups())) ?></div>
                    </div>
                    <a href="<?= site_url('logout') ?>" class="text-secondary" title="Sair"><i
                            class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </aside>

        <div class="flex-grow-1" style="min-width: 0">
            <nav class="navbar bg-white border-bottom px-3 px-lg-4">
                <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#menuAdmin" aria-label="Abrir menu">
                    <i class="bi bi-list"></i>
                </button>
                <span class="navbar-text fw-semibold text-dark"><?= esc($titulo ?? 'Painel') ?></span>
                <a class="ms-auto text-decoration-none text-secondary" href="<?= site_url('/') ?>" target="_blank">
                    Ver site <i class="bi bi-box-arrow-up-right ms-1"></i>
                </a>
            </nav>
            <main class="p-3 p-lg-4">
                <?php if (session('msg')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i><?= esc(session('msg')) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif ?>
                <?= $this->renderSection('conteudo') ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>