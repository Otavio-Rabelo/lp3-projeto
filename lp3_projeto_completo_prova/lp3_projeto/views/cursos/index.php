<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cursos Cadastrados</h3>
            <a href="/lp3_projeto/cursos/adicionar" class="btn btn-success btn-sm">+ Novo Curso</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do curso</th>
                    <th>Descrição</th>
                    <th>Carga horária (horas)</th>
                    <th>Valor</th>
                    <th>Data de início</th>
                    <th>Nível</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cursos)): ?>
                    <?php foreach ($cursos as $linha): ?>
                        <tr>
                    <td><?= $linha['id'] ?></td>
                    <td><?= htmlspecialchars((string)($linha['nome'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['descricao'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['carga_horaria'] ?? '')) ?></td>
                    <td><?= $linha['valor'] !== null ? number_format((float)$linha['valor'], 2, ',', '.') : '' ?></td>
                    <td><?= htmlspecialchars((string)($linha['data_inicio'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['nivel'] ?? '')) ?></td>
                    <td class="text-center">
                        <a href="/lp3_projeto/cursos/editar?id=<?= $linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/lp3_projeto/cursos/excluir?id=<?= $linha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
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
