<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="page-layout"><?php include __DIR__ . '/../layout/nav.php'; ?><div class="content-panel">
<div class="header-action"><h3>Livros cadastrados</h3><a href="/lp3_projeto/livros/adicionar" class="btn btn-success btn-sm">+ Novo livro</a></div>
<table class="table table-striped"><thead><tr><th>ID</th><th>Título</th><th>Autor</th><th>ISBN</th><th>Ano</th><th>Gênero</th><th>Capa</th><th>Ações</th></tr></thead><tbody>
<?php if (!empty($livros)): foreach ($livros as $linha): ?>
<tr><td><?= (int)$linha['id'] ?></td><td><?= htmlspecialchars($linha['titulo']) ?></td><td><?= htmlspecialchars($linha['autor']) ?></td><td><?= htmlspecialchars($linha['isbn'] ?? '') ?></td><td><?= htmlspecialchars((string)($linha['ano_publicacao'] ?? '')) ?></td><td><?= htmlspecialchars($linha['genero_nome'] ?? 'Sem gênero') ?></td><td><?= htmlspecialchars($linha['capa'] ?? '') ?></td><td>
<a href="/lp3_projeto/livros/editar?id=<?= (int)$linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
<a href="/lp3_projeto/livros/excluir?id=<?= (int)$linha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este livro?');">Excluir</a>
</td></tr>
<?php endforeach; else: ?><tr><td colspan="8" style="text-align:center">Nenhum livro cadastrado.</td></tr><?php endif; ?>
</tbody></table></div></div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
