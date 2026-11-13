<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Funcionário</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        <form action="/lp3_projeto/funcionarios/editar?id=<?= $dado['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($dado['nome'] ?? '') ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" value="<?= htmlspecialchars($dado['cargo'] ?? '') ?>"  class="form-control">
            </div>

            <div class="form-group">
                <label for="salario">Salário:</label>
                <input type="number" id="salario" name="salario" value="<?= htmlspecialchars($dado['salario'] ?? '') ?>" step="0.01" min="0" class="form-control">
            </div>

            <div class="form-group">
                <label for="data_admissao">Data de admissão:</label>
                <input type="date" id="data_admissao" name="data_admissao" value="<?= htmlspecialchars($dado['data_admissao'] ?? '') ?>"  class="form-control">
            </div>

            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea id="observacoes" name="observacoes" class="form-control" rows="4" ><?= htmlspecialchars($dado['observacoes'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="ativo">Funcionário ativo:</label>
                <input type="checkbox" id="ativo" name="ativo" value="1" <?= !empty($dado['ativo']) ? 'checked' : '' ?>>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/funcionarios" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
