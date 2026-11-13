<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Fornecedores Cadastrados</h3>
            <a href="/lp3_projeto/fornecedores/adicionar" class="btn btn-success btn-sm">+ Novo Fornecedor</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razão social</th>
                    <th>CNPJ (somente números)</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Fornecedor ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($fornecedores)): ?>
                    <?php foreach ($fornecedores as $linha): ?>
                        <tr>
                    <td><?= $linha['id'] ?></td>
                    <td><?= htmlspecialchars((string)($linha['razao_social'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['cnpj'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['telefone'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['email'] ?? '')) ?></td>
                    <td><?= htmlspecialchars((string)($linha['endereco'] ?? '')) ?></td>
                    <td><?= !empty($linha['ativo']) ? 'Sim' : 'Não' ?></td>
                    <td class="text-center">
                        <a href="/lp3_projeto/fornecedores/editar?id=<?= $linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/lp3_projeto/fornecedores/excluir?id=<?= $linha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
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
