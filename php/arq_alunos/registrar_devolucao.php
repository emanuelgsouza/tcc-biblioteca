<?php
// Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Primeiro momento: o se pesquisará qual livro que está sendo emprestado
if(isset($_GET["idaluno"])){
    $idaluno = $_GET["idaluno"];
    $idlivro = $_GET["idlivro"];
    $idreg   = $_GET["idreg"];
    $q = "SELECT aluno, turma FROM alunos_matriculados WHERE idaluno = $idaluno";
    $sel = executaQuery($con, $q);
    if(mysqli_num_rows($sel) != 0){
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        echo "<p> Registrando devolução de " . $data[0]["aluno"] . " da turma " . $data[0]["turma"] . "</p>";
        echo "<p> Dados do empréstimo </p>";
        $q  = "SELECT r.idlivro, r.data, l.titulo, l.autor FROM regalunos as r JOIN livros as l ON r.idlivro = l.idlivro WHERE r.idregistro = $idreg";
        $sel  = executaQuery($con, $q);
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        $dia = strtotime($data[0]["data"]);
        $dia = date("d-m-Y", $dia);
        echo "<p> Data: " . $dia . " </p>";
        echo "<p> Título: " . $data[0]["titulo"] . " </p>";
        echo "<p> Autor: " . $data[0]["autor"] . " </p>";
        echo "<button type='button' name='confirm' class='bt confirm' onclick='confirmaDevolucao()'> Confirmar Devolução </button>";
        echo "<div id='mostrarDadosLivro'></div>";
        }else{}
}else{}

if(isset($_GET["idAluno"])){ // Fazer o registro da devolução e renovando o estoque
    $id = $_GET["idAluno"];
    $idlivro = $_GET["idLivro"];
    $date = date("20y-m-d");
    // Registrando o a devolução
    $q = "INSERT INTO regalunos (data, situacao, idaluno, idlivro) VALUES ('$date', 'd', '$id', $idlivro)";
    $sel = executaQuery($con, $q);
    if($sel){
        // Pegando o nome do aluno
        $q = "SELECT aluno FROM alunos_matriculados WHERE idaluno = $id";
        $sel = executaQuery($con, $q);
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        $nome = $data[0]["aluno"];

        // Pegando o título do livro
        $q = "SELECT titulo FROM livros WHERE idlivro = $idlivro";
        $sel = executaQuery($con, $q);
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        $titulo = $data[0]["titulo"];

        // Mostrando que foi registrado
        echo "<p> Foi registrado a devolução do livro $titulo por $nome";

        // Recuperando o estoque
        $q = "SELECT estoque FROM livros WHERE idlivro = $idlivro";
        $sel = executaQuery($con, $q);
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        $est = $data[0]["estoque"];

        // Aumentando o estoque
        $q = "UPDATE livros SET estoque = $est+1 WHERE idlivro = $idlivro";
        $sel = executaQuery($con, $q);

        // Registrando a devolução no registro de livros
        $q = "INSERT INTO reglivros (idreg, idlivro, data, situacao) VALUES (DEFAULT, '$idlivro', '$date', 'd')";
        $sel = executaQuery($con, $q);
    }else{
        echo "<p> Não foi possivel registrar a devolução </p>";
    }
}

// Fechando a conexão
fechaDB($con);
?>
