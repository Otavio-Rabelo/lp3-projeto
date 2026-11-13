<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="page-layout"><?php include __DIR__ . '/../layout/nav.php'; ?><div class="content-panel">
<h3>Cadastrar livro</h3>
<?php if (isset($erro)): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
<form action="/lp3_projeto/livros/adicionar" method="POST" class="card-form">
<div class="form-group"><label for="titulo">Título:</label><input type="text" id="titulo" name="titulo" value="" required maxlength="200" class="form-control"></div>
<div class="form-group"><label for="autor">Autor:</label><input type="text" id="autor" name="autor" value="" required maxlength="150" class="form-control"></div>
<div class="form-group"><label for="isbn">ISBN:</label><input type="text" id="isbn" name="isbn" value="" maxlength="20" class="form-control"></div>
<div class="form-group"><label for="ano_publicacao">Ano de publicação:</label><input type="number" id="ano_publicacao" name="ano_publicacao" value="" min="0" max="65535" class="form-control"></div>
<div class="form-group"><label for="sinopse">Sinopse:</label><textarea id="sinopse" name="sinopse" rows="4" class="form-control"></textarea></div>
<div class="form-group"><label for="capa">Capa (nome do arquivo):</label><input type="text" id="capa" name="capa" value="" maxlength="255" class="form-control" placeholder="ex: capa-livro.jpg"></div>
<div class="form-group"><label for="id_genero">Gênero:</label><select id="id_genero" name="id_genero" class="form-control"><option value="">Sem gênero</option><?php foreach ($generos as $g): ?><option value="<?= (int)$g['id'] ?>" ><?= htmlspecialchars($g['nome']) ?></option><?php endforeach; ?></select></div>
<div class="mt-3 d-flex gap-2"><button type="submit" class="btn btn-success">Salvar</button><a href="/lp3_projeto/livros" class="btn btn-secondary">Voltar</a></div>
</form></div></div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
