<?php
require_once __DIR__ . '/../config/Database.php';

class Genero {
    private $db;
    private $tabela = 'generos';

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function listar() {
        return $this->db->query("SELECT * FROM {$this->tabela} ORDER BY nome ASC")->fetchAll();
    }

    public function salvar(string $nome, ?string $descricao) {
        $sql = "INSERT INTO {$this->tabela} (nome, descricao) VALUES (:nome, :descricao)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':nome'=>$nome, ':descricao'=>$descricao]);
    }

    public function atualizar(int $id, string $nome, ?string $descricao) {
        $sql = "UPDATE {$this->tabela} SET nome=:nome, descricao=:descricao WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':nome'=>$nome, ':descricao'=>$descricao, ':id'=>$id]);
    }

    public function buscarPorId(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->tabela} WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }

    public function excluir(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->tabela} WHERE id=:id");
        return $stmt->execute([':id'=>$id]);
    }
}
