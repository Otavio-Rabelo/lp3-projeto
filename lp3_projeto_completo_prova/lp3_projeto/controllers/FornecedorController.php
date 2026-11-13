<?php
class FornecedorController
{
    private $model;

    public function __construct()
    {
        $this->model = new Fornecedor();
    }

    public function index()
    {
        $fornecedores = $this->model->listar();
        require __DIR__ . '/../views/fornecedores/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $razao_social = filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_SPECIAL_CHARS);
            $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
            if ($cnpj === '') { $cnpj = null; }
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
            $ativo = isset($_POST['ativo']) ? 1 : 0;
            if ((!empty($razao_social))) {
                $this->model->salvar($razao_social, $cnpj, $telefone, $email, $endereco, $ativo);
                header('Location: /lp3_projeto/fornecedores');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        require __DIR__ . '/../views/fornecedores/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/fornecedores');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $razao_social = filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_SPECIAL_CHARS);
            $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
            if ($cnpj === '') { $cnpj = null; }
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
            $ativo = isset($_POST['ativo']) ? 1 : 0;
            if ((!empty($razao_social))) {
                $this->model->atualizar($id, $razao_social, $cnpj, $telefone, $email, $endereco, $ativo);
                header('Location: /lp3_projeto/fornecedores');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }

        $dado = $this->model->buscarPorId($id);
        if (!$dado) {
            header('Location: /lp3_projeto/fornecedores');
            exit();
        }
        require __DIR__ . '/../views/fornecedores/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/fornecedores');
        exit();
    }
}
