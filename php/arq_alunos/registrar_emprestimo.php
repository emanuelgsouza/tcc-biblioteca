<?php
// Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Pesquisando o livro de fato
if(isset($_GET["query"])){
    $codBook = $_GET["query"];

    // Mostrando o livro pesquisado
    $q    = "SELECT idlivro,titulo, autor, estoque FROM livros WHERE cod_livro = $codBook";
    $sel   = executaQuery($con, $q);
    if(mysqli_num_rows($sel) != 0){ // Se o livro existe
      $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
      $estoque = $data[0]["estoque"];
      if($estoque > 0){
        // Conferindo se o livro está no estoque
        $idlivro = $data[0]["idlivro"];
        $titulo  = $data[0]["titulo"];
        echo "<p> O resultado da busca foi </p>";
        echo "<p> Título: " . $data[0]["titulo"] . " </p>";
        echo "<p> Autor: " . $data[0]["autor"] . " </p>";
        echo "<div class='data'>";
          echo "<label for='date'> Data do empréstimo: </label>";
          echo "<input type='date' id='date'>";
        echo "</div>";
        echo "<div class='data'>";
          echo "<label for='selectDate'> Selecione o prazo para a entrega: </label>";
          echo "<select id='selectDate'>";
          echo "<option value='+15 days'> 15 dias</option>";
          echo "<option value='+30 days'> 30 dias </option>";
          echo "</select>";
        echo "</div>";
        echo "<button type='button' name='escolha' class='btn bt confirm' onclick='confirmarEmprestimo()'> Solicitar empréstimo </button>";
      }else{
          echo "<p> O livro não pode ser emprestado porque não há mais em estoque";
      }
    }
}

// Fechando a conexão
fechaDB($con);
?>
