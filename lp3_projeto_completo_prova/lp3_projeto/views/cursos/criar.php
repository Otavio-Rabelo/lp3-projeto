<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Curso</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        <form action="/lp3_projeto/cursos/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome do curso:</label>
                <input type="text" id="nome" name="nome"  required class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="4" ></textarea>
            </div>

            <div class="form-group">
                <label for="carga_horaria">Carga horária (horas):</label>
                <input type="number" id="carga_horaria" name="carga_horaria"  required min="1" class="form-control">
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor"  step="0.01" min="0" class="form-control">
            </div>

            <div class="form-group">
                <label for="data_inicio">Data de início:</label>
                <input type="date" id="data_inicio" name="data_inicio"   class="form-control">
            </div>

            <div class="form-group">
                <label for="nivel">Nível:</label>
                <input type="text" id="nivel" name="nivel"  maxlength="20" class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/cursos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
