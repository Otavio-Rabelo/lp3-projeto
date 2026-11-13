<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Funcionários Cadastrados</h3>
            <a href="/lp3_projeto/funcionarios/adicionar" class="btn btn-success btn-sm">+ Novo Funcionário</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Salário</th>
                    <th>Data de admissão</th>
                    <th>Observações</th>
                    <th>Funcionário ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($funcionarios)): ?>
                    <?php foreach ($funcionarios as $linha): ?>
                        <tr>
                    <td><?= $linha['id'] ?></td>
                    <td><?= htmlspecialchars((string)($linha['nome'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['cargo'] ?? '')) ?></td>
                    <td><?= $linha['salario'] !== null ? number_format((float)$linha['salario'], 2, ',', '.') : '' ?></td>
                    <td><?= htmlspecialchars((string)($linha['data_admissao'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['observacoes'] ?? '')) ?></td>
                    <td><?= !empty($linha['ativo']) ? 'Sim' : 'Não' ?></td>
                    <td class="text-center">
                        <a href="/lp3_projeto/funcionarios/editar?id=<?= $linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/lp3_projeto/funcionarios/excluir?id=<?= $linha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
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
