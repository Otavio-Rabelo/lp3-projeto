# LP3-Projeto

## Módulos da atividade de CRUD

Foram adicionados os módulos Eventos, Funcionários, Fornecedores, Cursos e Notícias, cada um com Model, Controller e Views (criar, editar e listar). As rotas foram registradas em `index.php`, os links foram incluídos no menu lateral e as tabelas foram acrescentadas ao final de `schema.sql`.

Para usar: importe/execute `schema.sql` no phpMyAdmin (banco `curso_db`) e acesse, por exemplo, `http://localhost/lp3_projeto/eventos`.

Observação: os campos `data_publicacao` e `visualizacoes` de Notícias usam os valores padrão definidos no banco ao cadastrar. O campo `publicada` começa desmarcado (false).
