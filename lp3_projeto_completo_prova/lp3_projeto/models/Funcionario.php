<?php
require_once __DIR__ . '/../config/Database.php';

class Funcionario
{
    private $db;
    private $tabela = 'funcionarios';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $nome, ?string $cargo, ?float $salario, ?string $data_admissao, ?string $observacoes, bool $ativo)
    {
        $sql = "INSERT INTO {$this->tabela} (nome, cargo, salario, data_admissao, observacoes, ativo) VALUES (:nome, :cargo, :salario, :data_admissao, :observacoes, :ativo)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':cargo' => $cargo,
            ':salario' => $salario,
            ':data_admissao' => $data_admissao,
            ':observacoes' => $observacoes,
            ':ativo' => $ativo,
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nome, ?string $cargo, ?float $salario, ?string $data_admissao, ?string $observacoes, bool $ativo)
    {
        $sets = 'nome = :nome, cargo = :cargo, salario = :salario, data_admissao = :data_admissao, observacoes = :observacoes, ativo = :ativo';
        $sql = "UPDATE {$this->tabela} SET " . $sets . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':cargo' => $cargo,
            ':salario' => $salario,
            ':data_admissao' => $data_admissao,
            ':observacoes' => $observacoes,
            ':ativo' => $ativo,
            ':id' => $id,
        ];
        return $stmt->execute($values);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM {$this->tabela} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM {$this->tabela} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
