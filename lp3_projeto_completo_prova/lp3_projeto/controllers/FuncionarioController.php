<?php
class FuncionarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new Funcionario();
    }

    public function index()
    {
        $funcionarios = $this->model->listar();
        require __DIR__ . '/../views/funcionarios/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);
            $salario = ($_POST['salario'] ?? '') !== '' ? filter_var($_POST['salario'], FILTER_VALIDATE_FLOAT) : null;
            $data_admissao = ($_POST['data_admissao'] ?? '') !== '' ? $_POST['data_admissao'] : null;
            $observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_SPECIAL_CHARS);
            $ativo = isset($_POST['ativo']) ? 1 : 0;
            if ((!empty($nome)) && ($salario === null || $salario !== false)) {
                $this->model->salvar($nome, $cargo, $salario, $data_admissao, $observacoes, $ativo);
                header('Location: /lp3_projeto/funcionarios');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        require __DIR__ . '/../views/funcionarios/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/funcionarios');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);
            $salario = ($_POST['salario'] ?? '') !== '' ? filter_var($_POST['salario'], FILTER_VALIDATE_FLOAT) : null;
            $data_admissao = ($_POST['data_admissao'] ?? '') !== '' ? $_POST['data_admissao'] : null;
            $observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_SPECIAL_CHARS);
            $ativo = isset($_POST['ativo']) ? 1 : 0;
            if ((!empty($nome)) && ($salario === null || $salario !== false)) {
                $this->model->atualizar($id, $nome, $cargo, $salario, $data_admissao, $observacoes, $ativo);
                header('Location: /lp3_projeto/funcionarios');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }

        $dado = $this->model->buscarPorId($id);
        if (!$dado) {
            header('Location: /lp3_projeto/funcionarios');
            exit();
        }
        require __DIR__ . '/../views/funcionarios/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/funcionarios');
        exit();
    }
}
