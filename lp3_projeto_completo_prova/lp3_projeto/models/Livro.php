<?php
require_once __DIR__ . '/../config/Database.php';

class Livro {
    private $db;
    private $tabela = 'livros';

    public function __construct() { $this->db = Database::getConnection(); }

    public function listar() {
        $sql = "SELECT l.*, g.nome AS genero_nome
                FROM livros l LEFT JOIN generos g ON l.id_genero = g.id
                ORDER BY l.id DESC";
        return $this->db->query($sql)->fetchAll();
    }

    public function listarGeneros() {
        return $this->db->query("SELECT id, nome FROM generos ORDER BY nome ASC")->fetchAll();
    }

    public function salvar(string $titulo, string $autor, ?string $isbn, ?int $ano, ?string $sinopse, ?string $capa, ?int $id_genero) {
        $sql = "INSERT INTO livros (titulo, autor, isbn, ano_publicacao, sinopse, capa, id_genero)
                VALUES (:titulo, :autor, :isbn, :ano, :sinopse, :capa, :genero)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':titulo'=>$titulo, ':autor'=>$autor, ':isbn'=>$isbn, ':ano'=>$ano,
            ':sinopse'=>$sinopse, ':capa'=>$capa, ':genero'=>$id_genero]);
    }

    public function atualizar(int $id, string $titulo, string $autor, ?string $isbn, ?int $ano, ?string $sinopse, ?string $capa, ?int $id_genero) {
        $sql = "UPDATE livros SET titulo=:titulo, autor=:autor, isbn=:isbn, ano_publicacao=:ano,
                sinopse=:sinopse, capa=:capa, id_genero=:genero WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':titulo'=>$titulo, ':autor'=>$autor, ':isbn'=>$isbn, ':ano'=>$ano,
            ':sinopse'=>$sinopse, ':capa'=>$capa, ':genero'=>$id_genero, ':id'=>$id]);
    }

    public function buscarPorId(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM livros WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }

    public function excluir(int $id) {
        $stmt = $this->db->prepare("DELETE FROM livros WHERE id=:id");
        return $stmt->execute([':id'=>$id]);
    }
}
