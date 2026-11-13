<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="page-layout"><?php include __DIR__ . '/../layout/nav.php'; ?><div class="content-panel">
        <h3>Editar gênero</h3>
        <?php if (isset($erro)): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
        <form action="/lp3_projeto/generos/editar?id=<?= (int)$dado['id'] ?>" method="POST" class="card-form">
            <div class="form-group"><label for="nome">Nome:</label><input type="text" id="nome" name="nome" value="<?= htmlspecialchars($dado['nome']) ?>" required maxlength="100" class="form-control"></div>
            <div class="form-group"><label for="descricao">Descrição:</label><textarea id="descricao" name="descricao" maxlength="255" class="form-control" rows="3"><?= htmlspecialchars($dado['descricao'] ?? '') ?></textarea></div>
            <div class="mt-3 d-flex gap-2"><button type="submit" class="btn btn-success">Salvar</button><a href="/lp3_projeto/generos" class="btn btn-secondary">Voltar</a></div>
        </form>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>