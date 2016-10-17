<?php
// Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

if(isset($_GET["idnaluno"])){
    $pessoa = $_GET["idnaluno"];
    $livro = $_GET["cod_book"];
    $date = $_GET["data"];

    // Pegando o nome da pessoa
    $q = "SELECT nome FROM naoalunos WHERE idnaluno = $pessoa";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    $nome = $data[0]["nome"];

    // Pegando o título do livro
    $q = "SELECT idlivro, titulo FROM livros WHERE cod_livro = $livro";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    $titulo = $data[0]["titulo"];
    $idlivro = $data[0]["idlivro"];

    // Registrando o empréstimo
    $q = "INSERT INTO regnaoalunos (idregistro, data, situacao, idnaluno, idlivro) VALUES (DEFAULT, '$date', 'e', '$pessoa', '$idlivro')";
    $sel = executaQuery($con, $q);
    if($sel) {
      // Mostrando que foi registrado
      echo "<p> Foi registrado o empréstimo do livro <span class='txt-confirm'>$titulo</span> a pessoa <span class='txt-confirm'>$nome</span> </p>";
    } else {
      echo "<p> Não houve o registro do empréstimo do livro </p>";
    }

    // Recuperando o estoque
    $q = "SELECT estoque FROM livros WHERE idlivro = $idlivro";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    $est = $data[0]["estoque"];

    // Diminuindo o estoque
    $q = "UPDATE livros SET estoque = $est-1 WHERE idlivro = $idlivro";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}

    // Colocando o registro na tabela de registro de livros
    $q = "INSERT INTO reglivros (idreg, idlivro, data, situacao) VALUES (DEFAULT, '$idlivro', '$date', 'e')";
    $sel = executaQuery($con, $q);
    if(!$sel){die(mysqli_error($con));}
}

// Fechando a conexão
fechaDB($con);
?>
