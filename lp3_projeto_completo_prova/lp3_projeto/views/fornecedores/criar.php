<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Fornecedor</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        <form action="/lp3_projeto/fornecedores/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="razao_social">Razão social:</label>
                <input type="text" id="razao_social" name="razao_social"  required class="form-control">
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ (somente números):</label>
                <input type="text" id="cnpj" name="cnpj"  maxlength="14" class="form-control">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone"   class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"   class="form-control">
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <textarea id="endereco" name="endereco" class="form-control" rows="4" ></textarea>
            </div>

            <div class="form-group">
                <label for="ativo">Fornecedor ativo:</label>
                <input type="checkbox" id="ativo" name="ativo" value="1" checked>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/fornecedores" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
