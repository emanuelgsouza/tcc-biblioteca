<?php
// Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

if(isset($_GET["nome"])){
    $nome = $_GET["nome"];
    $q   = "SELECT idnaluno, nome, telefone2 FROM naoalunos WHERE nome LIKE '%$nome%'";
    $sel = executaQuery($con, $q);
    $c   = mysqli_num_rows($sel);
    if($c != 0){
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        echo "<p> Selecione abaixo o nome </p>";
        for($x = 0; $x < count($data); $x++){
          $pessoa = $data[$x]["idnaluno"];
          $valor = $data[$x]["nome"] . " | " . $data[$x]["telefone2"];
          echo "<input type='radio' name='escolha' value='$pessoa' id='$pessoa' onchange='respondeChecked()'> <label for='$pessoa' class='escolha'> $valor </label> <br>";
        }
    }else{echo "<p> O nome <span class='txt-alert'>$nome</span> não está registrado no banco de dados de pessoas!</p>";}
}else{}

// Para parte de registro de devolução ou empréstimo de determinado livro
if(isset($_GET["idnaluno"])){
    $idnaluno = $_GET["idnaluno"];
    $q   = "SELECT * FROM naoalunos WHERE idnaluno = $idnaluno";
    $sel = executaQuery($con, $q);
    echo "<div id='resultstwo'>";
    if(mysqli_num_rows($sel) != 0){
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        echo "<p> Resultados </p>";
        echo "<p> Nome: " . $data[0]['nome'] . "</p>";
        echo "<p> Endereço: " . $data[0]['endereco'] . "</p>";
    }
    echo "<button class='btn bt filtro' type='button' onclick='voltar()'> Voltar ao formulario de adicionar </button>";
    echo "</div>";

    // Pegando o id da pessoa
    $q  = "SELECT MAX(idregistro), r.data, r.situacao, p.nome, l.titulo, l.autor, l.idlivro FROM regnaoalunos as r JOIN naoalunos as p ON r.idnaluno = p.idnaluno JOIN livros as l ON r.idlivro = l.idlivro WHERE r.idnaluno = $idnaluno AND idregistro = (SELECT MAX(idregistro) FROM regnaoalunos WHERE idnaluno = $idnaluno)";
    $sel  = executaQuery($con, $q);
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    $situacao = $data[0]["situacao"];
    $idlivro = $data[0]["idlivro"];
    $idreg = $data[0]["MAX(idregistro)"];
    echo "<div id='resultsthree'>";
    if($situacao === "e"){
        echo "<p> Há um livro emprestado </p>";
        echo "<p> Título: " . $data[0]["titulo"] . " </p>";
        echo "<p> Autor: " . $data[0]["autor"] . " </p>";
        echo "<button type='button' class='btn bt confirm' data-idlivro='$idlivro' data-idreg='$idreg' id='bt-reg' onclick='mostrarEmprestimo()'> Mostrar dados do emprestimo </button>";
        echo "<div id='mostrarDadosLivro'></div>";
    }else{
      // Caso não tenha algum livro emprestado
      echo "<div>";
      echo "<p> A pessoa não possui livro emprestado </p>";
      echo "<label for='titulo'> Digite o nome do livro para registrar empréstimo </label>";
      echo "<input type='text' id='titulo' autofocus>";
      echo "<button class='btn bt filtro' onclick='buscaLivro()'> Pesquisar </button>";
      echo "<div id='recebeBusca'></div>";
      echo "</div>";
    }
}else{}

// Fechando a conexão
fechaDB($con);
?>
