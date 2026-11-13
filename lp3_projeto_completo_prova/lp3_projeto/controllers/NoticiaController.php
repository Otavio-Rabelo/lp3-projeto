<?php
class NoticiaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Noticia();
    }

    public function index()
    {
        $noticias = $this->model->listar();
        require __DIR__ . '/../views/noticias/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
            $publicada = isset($_POST['publicada']) ? 1 : 0;
            if ((!empty($titulo)) && (!empty($conteudo))) {
                $this->model->salvar($titulo, $conteudo, $autor, $publicada);
                header('Location: /lp3_projeto/noticias');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        require __DIR__ . '/../views/noticias/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/noticias');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
            $publicada = isset($_POST['publicada']) ? 1 : 0;
            if ((!empty($titulo)) && (!empty($conteudo))) {
                $this->model->atualizar($id, $titulo, $conteudo, $autor, $publicada);
                header('Location: /lp3_projeto/noticias');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }

        $dado = $this->model->buscarPorId($id);
        if (!$dado) {
            header('Location: /lp3_projeto/noticias');
            exit();
        }
        require __DIR__ . '/../views/noticias/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/noticias');
        exit();
    }
}
