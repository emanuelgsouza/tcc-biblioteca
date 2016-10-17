<?php
// Arquivo responsável por adicionar os alunos no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

if(isset($_GET["titulo"])) {
  $titulo = $_GET["titulo"];
  $q   = "SELECT titulo, autor, cod_livro FROM livros WHERE titulo LIKE '%$titulo%'";
  $sel = executaQuery($con, $q);
  $c   = mysqli_num_rows($sel);
  if($c != 0){
    echo "<p>Esta solicitação retornou em " . $c . " registro(s)</p>";
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    for($x = 0; $x < count($data); $x++){
      $valor = $data[0]['titulo'] . " de " . $data[0]['autor'];
      $cod_book = $data[0]['cod_livro'];
      echo "<input type='radio' name='escolha' value='$cod_book' id='$cod_book' onchange='respondeChecked()'> <label for='$cod_book' class='escolha'> $valor </label> <br>";
    }
  } else {
    echo "<p> Este livro não está registrado no banco de dados!</p>";
  }
}

if(isset($_GET["cod_book"])) {
  $cod_book = $_GET["cod_book"];

  $query = "SELECT idlivro, titulo FROM livros WHERE cod_livro = $cod_book";
  $sel   = executaQuery($con, $query);
  $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
  $titulo = $data[0]["titulo"];
  $idlivro = $data[0]["idlivro"];

  // Excluindo as referências
  $query = "DELETE FROM reglivros WHERE idlivro = $idlivro";
  $sel   = executaQuery($con, $query);

  $query = "DELETE FROM regalunos WHERE idlivro = $idlivro";
  $sel   = executaQuery($con, $query);

  $query = "DELETE FROM regnaoalunos WHERE idlivro = $idlivro";
  $sel   = executaQuery($con, $query);

  $query = "DELETE FROM livros WHERE cod_livro = $cod_book";
  $sel   = executaQuery($con, $query);
  if($sel){
      echo "<p> Foi deletado com sucesso do banco de dados o registro de <span class='txt-confirm'>$titulo</span> </p>";
  }else{
      echo "<p> Não foi possível deletar no banco de dados o registro de <span class='txt-alert'>$titulo</span> </p>";
  }
}

// Fechando a conexão
fechaDB($con);
?>
