<?php
class EventoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Evento();
    }

    public function index()
    {
        $eventos = $this->model->listar();
        require __DIR__ . '/../views/eventos/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $local_evento = filter_input(INPUT_POST, 'local_evento', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_evento = trim($_POST['data_evento'] ?? '');
            $data_evento = str_replace('T', ' ', $data_evento);
            if ($data_evento !== '') { $data_evento .= ':00'; } else { $data_evento = null; }
            $capacidade = ($_POST['capacidade'] ?? '') !== '' ? filter_var($_POST['capacidade'], FILTER_VALIDATE_INT) : null;
            $ativo = isset($_POST['ativo']) ? 1 : 0;
            if ((!empty($titulo)) && (!empty($data_evento)) && ($capacidade === null || $capacidade !== false)) {
                $this->model->salvar($titulo, $descricao, $local_evento, $data_evento, $capacidade, $ativo);
                header('Location: /lp3_projeto/eventos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        require __DIR__ . '/../views/eventos/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/eventos');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $local_evento = filter_input(INPUT_POST, 'local_evento', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_evento = trim($_POST['data_evento'] ?? '');
            $data_evento = str_replace('T', ' ', $data_evento);
            if ($data_evento !== '') { $data_evento .= ':00'; } else { $data_evento = null; }
            $capacidade = ($_POST['capacidade'] ?? '') !== '' ? filter_var($_POST['capacidade'], FILTER_VALIDATE_INT) : null;
            $ativo = isset($_POST['ativo']) ? 1 : 0;
            if ((!empty($titulo)) && (!empty($data_evento)) && ($capacidade === null || $capacidade !== false)) {
                $this->model->atualizar($id, $titulo, $descricao, $local_evento, $data_evento, $capacidade, $ativo);
                header('Location: /lp3_projeto/eventos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }

        $dado = $this->model->buscarPorId($id);
        if (!$dado) {
            header('Location: /lp3_projeto/eventos');
            exit();
        }
        require __DIR__ . '/../views/eventos/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/eventos');
        exit();
    }
}
