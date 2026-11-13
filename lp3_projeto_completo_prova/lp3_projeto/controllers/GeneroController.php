<?php
class GeneroController {
    private $model;
    public function __construct() { $this->model = new Genero(); }

    public function index() {
        $generos = $this->model->listar();
        require __DIR__ . '/../views/generos/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            if ($nome !== '') {
                try {
                    $this->model->salvar($nome, $descricao !== '' ? $descricao : null);
                    header('Location: /lp3_projeto/generos'); exit();
                } catch (PDOException $e) {
                    $erro = "Não foi possível salvar. Confira se já existe um gênero com esse nome.";
                }
            } else { $erro = "Informe o nome do gênero."; }
        }
        require __DIR__ . '/../views/generos/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) { header('Location: /lp3_projeto/generos'); exit(); }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            if ($nome !== '') {
                try {
                    $this->model->atualizar($id, $nome, $descricao !== '' ? $descricao : null);
                    header('Location: /lp3_projeto/generos'); exit();
                } catch (PDOException $e) {
                    $erro = "Não foi possível atualizar. Confira se já existe um gênero com esse nome.";
                }
            } else { $erro = "Informe o nome do gênero."; }
        }
        $dado = $this->model->buscarPorId($id);
        if (!$dado) { header('Location: /lp3_projeto/generos'); exit(); }
        require __DIR__ . '/../views/generos/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) $this->model->excluir($id);
        header('Location: /lp3_projeto/generos'); exit();
    }
}
