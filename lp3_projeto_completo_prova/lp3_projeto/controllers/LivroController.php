<?php
class LivroController {
    private $model;
    public function __construct() { $this->model = new Livro(); }

    public function index() {
        $livros = $this->model->listar();
        require __DIR__ . '/../views/livros/index.php';
    }

    private function dadosFormulario() {
        $titulo = trim($_POST['titulo'] ?? '');
        $autor = trim($_POST['autor'] ?? '');
        $isbn = trim($_POST['isbn'] ?? '');
        $anoTexto = trim($_POST['ano_publicacao'] ?? '');
        $ano = $anoTexto === '' ? null : filter_var($anoTexto, FILTER_VALIDATE_INT);
        $sinopse = trim($_POST['sinopse'] ?? '');
        $capa = trim($_POST['capa'] ?? '');
        $generoTexto = trim($_POST['id_genero'] ?? '');
        $genero = $generoTexto === '' ? null : filter_var($generoTexto, FILTER_VALIDATE_INT);
        if ($titulo === '' || $autor === '' || ($anoTexto !== '' && ($ano === false || $ano < 0 || $ano > 65535)) ||
            ($generoTexto !== '' && ($genero === false || $genero < 1))) return null;
        return [$titulo, $autor, $isbn !== '' ? $isbn : null, $ano, $sinopse !== '' ? $sinopse : null,
                $capa !== '' ? $capa : null, $genero];
    }

    public function adicionar() {
        $generos = $this->model->listarGeneros();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->dadosFormulario();
            if ($dados) {
                try {
                    $this->model->salvar(...$dados);
                    header('Location: /lp3_projeto/livros'); exit();
                } catch (PDOException $e) {
                    $erro = "Não foi possível salvar. Verifique se o ISBN já está cadastrado e se o gênero existe.";
                }
            } else { $erro = "Informe título e autor e confira o ano e o gênero."; }
        }
        require __DIR__ . '/../views/livros/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) { header('Location: /lp3_projeto/livros'); exit(); }
        $generos = $this->model->listarGeneros();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->dadosFormulario();
            if ($dados) {
                try {
                    $this->model->atualizar($id, ...$dados);
                    header('Location: /lp3_projeto/livros'); exit();
                } catch (PDOException $e) {
                    $erro = "Não foi possível atualizar. Verifique se o ISBN já está cadastrado e se o gênero existe.";
                }
            } else { $erro = "Informe título e autor e confira o ano e o gênero."; }
        }
        $dado = $this->model->buscarPorId($id);
        if (!$dado) { header('Location: /lp3_projeto/livros'); exit(); }
        require __DIR__ . '/../views/livros/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) $this->model->excluir($id);
        header('Location: /lp3_projeto/livros'); exit();
    }
}
