<?php
// Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

if(isset($_GET["idaluno"])){
    $aluno = $_GET["idaluno"];
    $livro = $_GET["cod_book"];
    $date = $_GET["data"];
    $prazo = $_GET["prazo"];
    $prazo = date("Y/m/d", strtotime($prazo, strtotime($date)));

    // Pegando o nome do aluno
    $q = "SELECT aluno, turma FROM alunos_matriculados WHERE idaluno = $aluno";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    $nome = $data[0]["aluno"];
    $turma = $data[0]["turma"];

    // Pegando o título do livro
    $q = "SELECT titulo, idlivro FROM livros WHERE cod_livro = $livro";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    $titulo = $data[0]["titulo"];
    $idLivro = $data[0]["idlivro"];

    // Registrando o empréstimo
    $q = "INSERT INTO regalunos (idregistro, data, situacao, idaluno, idlivro, prazo) VALUES (DEFAULT, '$date', 'e', '$aluno', '$idLivro', '$prazo')";
    $sel = executaQuery($con, $q);
    if($sel) {
      // Mostrando que foi registrado
      echo "<p> Foi registrado o empréstimo do livro <span class='txt-confirm'>$titulo</span> ao aluno(a) <span class='txt-confirm'>$nome</span> da turma <span class='txt-confirm'>$turma</span> </p>";
    } else {
      echo "<p> Não houve o registro do empréstimo do livro </p>";
    }

    // Recuperando o estoque
    $q = "SELECT estoque FROM livros WHERE cod_livro = '$livro'";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    if(!$sel){die(mysqli_error($con));}
    $est = $data[0]["estoque"];

    // Diminuindo o estoque
    $q = "UPDATE livros SET estoque = $est-1 WHERE cod_livro = '$livro'";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}

    // Colocando o registro na tabela de registro de livros
    $q = "INSERT INTO reglivros (idreg, idlivro, data, situacao) VALUES (DEFAULT, '$idLivro', '$date', 'e')";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
    }else{
      echo "<p> Não foi possivel registrar o empréstimo, por favor, contacte o administrador do sistema </p>";
    }

// Fechando a conexão
fechaDB($con);
?>
