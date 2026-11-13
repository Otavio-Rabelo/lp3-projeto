<?php
class CursoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Curso();
    }

    public function index()
    {
        $cursos = $this->model->listar();
        require __DIR__ . '/../views/cursos/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $carga_horaria = ($_POST['carga_horaria'] ?? '') !== '' ? filter_var($_POST['carga_horaria'], FILTER_VALIDATE_INT) : null;
            $valor = ($_POST['valor'] ?? '') !== '' ? filter_var($_POST['valor'], FILTER_VALIDATE_FLOAT) : null;
            $data_inicio = ($_POST['data_inicio'] ?? '') !== '' ? $_POST['data_inicio'] : null;
            $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_SPECIAL_CHARS);
            if ((!empty($nome)) && ($carga_horaria !== null && $carga_horaria !== false) && ($valor === null || $valor !== false)) {
                $this->model->salvar($nome, $descricao, $carga_horaria, $valor, $data_inicio, $nivel);
                header('Location: /lp3_projeto/cursos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        require __DIR__ . '/../views/cursos/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/cursos');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $carga_horaria = ($_POST['carga_horaria'] ?? '') !== '' ? filter_var($_POST['carga_horaria'], FILTER_VALIDATE_INT) : null;
            $valor = ($_POST['valor'] ?? '') !== '' ? filter_var($_POST['valor'], FILTER_VALIDATE_FLOAT) : null;
            $data_inicio = ($_POST['data_inicio'] ?? '') !== '' ? $_POST['data_inicio'] : null;
            $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_SPECIAL_CHARS);
            if ((!empty($nome)) && ($carga_horaria !== null && $carga_horaria !== false) && ($valor === null || $valor !== false)) {
                $this->model->atualizar($id, $nome, $descricao, $carga_horaria, $valor, $data_inicio, $nivel);
                header('Location: /lp3_projeto/cursos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }

        $dado = $this->model->buscarPorId($id);
        if (!$dado) {
            header('Location: /lp3_projeto/cursos');
            exit();
        }
        require __DIR__ . '/../views/cursos/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/cursos');
        exit();
    }
}
