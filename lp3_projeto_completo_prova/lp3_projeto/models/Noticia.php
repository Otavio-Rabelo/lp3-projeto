<?php
require_once __DIR__ . '/../config/Database.php';

class Noticia
{
    private $db;
    private $tabela = 'noticias';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $titulo, string $conteudo, ?string $autor, bool $publicada)
    {
        $sql = "INSERT INTO {$this->tabela} (titulo, conteudo, autor, publicada) VALUES (:titulo, :conteudo, :autor, :publicada)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':autor' => $autor,
            ':publicada' => $publicada,
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $titulo, string $conteudo, ?string $autor, bool $publicada)
    {
        $sets = 'titulo = :titulo, conteudo = :conteudo, autor = :autor, publicada = :publicada';
        $sql = "UPDATE {$this->tabela} SET " . $sets . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':autor' => $autor,
            ':publicada' => $publicada,
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
