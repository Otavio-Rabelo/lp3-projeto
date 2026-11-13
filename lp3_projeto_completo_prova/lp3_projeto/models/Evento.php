<?php
require_once __DIR__ . '/../config/Database.php';

class Evento
{
    private $db;
    private $tabela = 'eventos';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $titulo, ?string $descricao, ?string $local_evento, ?string $data_evento, ?int $capacidade, bool $ativo)
    {
        $sql = "INSERT INTO {$this->tabela} (titulo, descricao, local_evento, data_evento, capacidade, ativo) VALUES (:titulo, :descricao, :local_evento, :data_evento, :capacidade, :ativo)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':local_evento' => $local_evento,
            ':data_evento' => $data_evento,
            ':capacidade' => $capacidade,
            ':ativo' => $ativo,
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $titulo, ?string $descricao, ?string $local_evento, ?string $data_evento, ?int $capacidade, bool $ativo)
    {
        $sets = 'titulo = :titulo, descricao = :descricao, local_evento = :local_evento, data_evento = :data_evento, capacidade = :capacidade, ativo = :ativo';
        $sql = "UPDATE {$this->tabela} SET " . $sets . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':local_evento' => $local_evento,
            ':data_evento' => $data_evento,
            ':capacidade' => $capacidade,
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
