<?php
require_once __DIR__ . '/../config/Database.php';

class Curso
{
    private $db;
    private $tabela = 'cursos';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $nome, ?string $descricao, ?int $carga_horaria, ?float $valor, ?string $data_inicio, ?string $nivel)
    {
        $sql = "INSERT INTO {$this->tabela} (nome, descricao, carga_horaria, valor, data_inicio, nivel) VALUES (:nome, :descricao, :carga_horaria, :valor, :data_inicio, :nivel)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':carga_horaria' => $carga_horaria,
            ':valor' => $valor,
            ':data_inicio' => $data_inicio,
            ':nivel' => $nivel,
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nome, ?string $descricao, ?int $carga_horaria, ?float $valor, ?string $data_inicio, ?string $nivel)
    {
        $sets = 'nome = :nome, descricao = :descricao, carga_horaria = :carga_horaria, valor = :valor, data_inicio = :data_inicio, nivel = :nivel';
        $sql = "UPDATE {$this->tabela} SET " . $sets . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':carga_horaria' => $carga_horaria,
            ':valor' => $valor,
            ':data_inicio' => $data_inicio,
            ':nivel' => $nivel,
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
