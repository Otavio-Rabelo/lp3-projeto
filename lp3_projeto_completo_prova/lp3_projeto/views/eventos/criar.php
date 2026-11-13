<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Evento</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        <form action="/lp3_projeto/eventos/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo"  required class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="4" ></textarea>
            </div>

            <div class="form-group">
                <label for="local_evento">Local do Evento:</label>
                <input type="text" id="local_evento" name="local_evento"   class="form-control">
            </div>

            <div class="form-group">
                <label for="data_evento">Data e hora do Evento:</label>
                <input type="datetime-local" id="data_evento" name="data_evento"  required class="form-control">
            </div>

            <div class="form-group">
                <label for="capacidade">Capacidade:</label>
                <input type="number" id="capacidade" name="capacidade"  min="0" class="form-control">
            </div>

            <div class="form-group">
                <label for="ativo">Evento ativo:</label>
                <input type="checkbox" id="ativo" name="ativo" value="1" checked>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/eventos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
