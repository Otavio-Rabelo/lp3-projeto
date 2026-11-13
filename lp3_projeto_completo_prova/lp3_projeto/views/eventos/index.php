<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Eventos Cadastrados</h3>
            <a href="/lp3_projeto/eventos/adicionar" class="btn btn-success btn-sm">+ Novo Evento</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Local do Evento</th>
                    <th>Data e hora do Evento</th>
                    <th>Capacidade</th>
                    <th>Evento ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($eventos)): ?>
                    <?php foreach ($eventos as $linha): ?>
                        <tr>
                    <td><?= $linha['id'] ?></td>
                    <td><?= htmlspecialchars((string)($linha['titulo'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['descricao'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['local_evento'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['data_evento'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['capacidade'] ?? '')) ?></td>
                    <td><?= !empty($linha['ativo']) ? 'Sim' : 'Não' ?></td>
                    <td class="text-center">
                        <a href="/lp3_projeto/eventos/editar?id=<?= $linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/lp3_projeto/eventos/excluir?id=<?= $linha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
                    </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
