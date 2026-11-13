<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Notícias Cadastrados</h3>
            <a href="/lp3_projeto/noticias/adicionar" class="btn btn-success btn-sm">+ Novo Notícia</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Conteúdo</th>
                    <th>Autor</th>
                    <th>Data de publicação</th>
                    <th>Visualizações</th>
                    <th>Notícia publicada</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($noticias)): ?>
                    <?php foreach ($noticias as $linha): ?>
                        <tr>
                    <td><?= $linha['id'] ?></td>
                    <td><?= htmlspecialchars((string)($linha['titulo'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['conteudo'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['autor'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['data_publicacao'] ?? '')) ?></td>
                    <td><?= (int)($linha['visualizacoes'] ?? 0) ?></td>
                    <td><?= !empty($linha['publicada']) ? 'Sim' : 'Não' ?></td>
                    <td class="text-center">
                        <a href="/lp3_projeto/noticias/editar?id=<?= $linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/lp3_projeto/noticias/excluir?id=<?= $linha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
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
