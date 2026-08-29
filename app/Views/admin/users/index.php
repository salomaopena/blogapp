<?= $this->extend('layouts/admin') ?>
<?= $this->section('conteudo') ?>

<h1 class="fs-3 mb-4">Utilizadores</h1>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Utilizador</th>
                    <th>Papel</th>
                    <th class="pe-4" style="width: 320px">Alterar papel</th>
                </tr>
            </thead>
            <tbody>
                <?php $cores = ['admin' => 'danger', 'editor' => 'info', 'member' => 'secondary']; 

                use App\Libraries\IdCodec;?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td class="ps-4">
                            <div class="fw-semibold"><?= esc($u->username ?? '—') ?></div>
                            <div class="text-secondary small"><?= esc($u->email) ?></div>
                        </td>
                        <td>
                            <?php foreach ($u->getGroups() as $g): ?>
                                <span class="badge text-bg-<?= $cores[$g] ?? 'light' ?>"><?= esc($g) ?></span>
                            <?php endforeach ?>
                        </td>
                        <td class="pe-4">
                            <form method="post" action="<?= site_url('admin/usuarios/papel/' . IdCodec::encode($u->id)) ?>"
                                class="input-group input-group-sm">
                                <?= csrf_field() ?>
                                <select name="grupo" class="form-select">
                                    <?php foreach (['admin', 'editor', 'member'] as $g): ?>
                                        <option value="<?= $g ?>" 
                                        <?= in_array($g, $u->getGroups(), true) ? 'selected' : '' ?>>
                                            <?= $g ?></option>
                                    <?php endforeach ?>
                                </select>
                                <button class="btn btn-outline-secondary">Aplicar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>