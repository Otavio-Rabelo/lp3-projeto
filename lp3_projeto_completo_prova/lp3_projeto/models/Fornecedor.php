<?php
require_once __DIR__ . '/../config/Database.php';

class Fornecedor
{
    private $db;
    private $tabela = 'fornecedores';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $razao_social, ?string $cnpj, ?string $telefone, ?string $email, ?string $endereco, bool $ativo)
    {
        $sql = "INSERT INTO {$this->tabela} (razao_social, cnpj, telefone, email, endereco, ativo) VALUES (:razao_social, :cnpj, :telefone, :email, :endereco, :ativo)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':razao_social' => $razao_social,
            ':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':endereco' => $endereco,
            ':ativo' => $ativo,
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $razao_social, ?string $cnpj, ?string $telefone, ?string $email, ?string $endereco, bool $ativo)
    {
        $sets = 'razao_social = :razao_social, cnpj = :cnpj, telefone = :telefone, email = :email, endereco = :endereco, ativo = :ativo';
        $sql = "UPDATE {$this->tabela} SET " . $sets . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':razao_social' => $razao_social,
            ':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':endereco' => $endereco,
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
