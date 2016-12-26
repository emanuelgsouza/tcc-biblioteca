# Documetação

+ [Tabelas dos banco de dados](#tabelas-dos-banco-de-dados)
+ [Requisitos do Sistema](#requisitos-do-sistema)

---

## Tabelas dos Banco de Dados:

+ Aluno -- tabela para os alunos;

| Campo | Tipo    |
|-------|---------|
| Id    | Inteiro |
| Nome  | String  |
| Turma | Inteiro |

+ Não aluno -- tabela para os não alunos, pessoas não matriculadas na escola;

| Campo     | Tipo    |
|-----------|---------|
| Id        | Inteiro |
| Nome      | String  |
| Endereço  | String  |
| Telefone1 | Inteiro |
| Telefone2 | Inteiro |

+ Livro -- tabela para os livros;

| Campo            | Tipo    |
|------------------|---------|
| Id               | Inteiro |
| Título           | String  |
| Autor            | String  |
| Editora          | String  |
| Genero Literario | String  |
| Escola Literaria | String  |
| Didatico         | String  |
| Cod Livro        | Inteiro |
| Estante          | String  |
| Prateleira       | Inteiro |
| Estoque          | Inteiro |

+ Arquivo morto -- tabela para o arquivo morto, livros que não estão disponíveis para empréstimo;

| Campo            | Tipo    |
|------------------|---------|
| Id               | Inteiro |
| Título           | String  |
| Autor            | String  |
| Editora          | String  |
| Gaveta           | Inteiro |
| Livro            | Inteiro |
| Estoque          | Inteiro |

+ Registro de alunos -- tabela para o registro de empréstimo e devolução de alunos;

| Campo    | Tipo    |
|----------|---------|
| Id       | Inteiro |
| Data     | String  |
| Situação | String  |
| IdAluno  | Inteiro |
| IdLivro  | Inteiro |

+ Registro de não alunos -- tabela para o registro de empréstimo e devolução de não alunos;

| Campo    | Tipo    |
|----------|---------|
| Id       | Inteiro |
| Data     | String  |
| Situação | String  |
| IdNAluno | Inteiro |
| IdLivro  | Inteiro |

+ Registro de livros -- tabela para registrar empréstimo e devolução dos livros;

| Campo    | Tipo    |
|----------|---------|
| Id       | Inteiro |
| Data     | String  |
| Situação | String  |
| IdLivro  | Inteiro |

---

## Requisitos do Sistema:

+ Cadastro de Alunos, Não alunos, arquivo morto e livros. Entende-se por cadastro, o ato de registrar entrada de dados, alteração destes dados e exclusão dos mesmos;

+ Geração de Listas (Relatórios):

  + Alunos Inadimplentes em um determinado período;
  + Leitores que mais leram em um determinado período;
  + Livros mais lidos em um determinado período;
  + Listas de Alunos por Turma
