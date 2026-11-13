<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="page-layout">
<?php include __DIR__ . '/../layout/nav.php'; ?>
<div class="content-panel">
  <div class="header-action"><h3>Gêneros cadastrados</h3><a href="/lp3_projeto/generos/adicionar" class="btn btn-success btn-sm">+ Novo gênero</a></div>
  <table class="table table-striped"><thead><tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Ações</th></tr></thead><tbody>
  <?php if (!empty($generos)): foreach ($generos as $linha): ?>
    <tr><td><?= (int)$linha['id'] ?></td><td><?= htmlspecialchars($linha['nome']) ?></td><td><?= htmlspecialchars($linha['descricao'] ?? '') ?></td><td>
      <a href="/lp3_projeto/generos/editar?id=<?= (int)$linha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
      <a href="/lp3_projeto/generos/excluir?id=<?= (int)$linha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir este gênero? Os livros associados ficarão sem gênero.');">Excluir</a>
    </td></tr>
  <?php endforeach; else: ?><tr><td colspan="4" style="text-align:center">Nenhum gênero cadastrado.</td></tr><?php endif; ?>
  </tbody></table>
</div></div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
