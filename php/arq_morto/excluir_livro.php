<?php
// Arquivo responsável por adicionar os alunos no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Recuperando as variáveis do método POST
if(isset($_GET["titulo"])) {
  $titulo = strtoupper($_GET["titulo"]);

  $q = "SELECT * FROM arquivo_morto WHERE titulo LIKE '%$titulo%'";
  $sel = executaQuery($con, $q);
  $c   = mysqli_num_rows($sel);
  if($c != 0){
    echo "<p>Esta solicitação retornou em " . $c . " registro(s)</p>";
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    for($x = 0; $x < count($data); $x++){
      $valor = $data[0]['titulo'] . " de " . $data[0]['autor'];
      $idlivro = $data[0]['idlivro_arq'];
      echo "<input type='radio' name='escolha' value='$idlivro' id='$idlivro' onchange='respondeChecked()'> <label for='$idlivro' class='escolha'> $valor </label> <br>";
    }
  } else {
    echo "<p> Este livro não está registrado no banco de dados!</p>";
  }
}

if(isset($_GET["idlivro"])) {
  $idlivro = $_GET["idlivro"];

  $query = "SELECT titulo FROM arquivo_morto WHERE idlivro_arq = $idlivro";
  $sel   = executaQuery($con, $query);
  $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
  $titulo = $data[0]["titulo"];

  $query = "DELETE FROM arquivo_morto WHERE idlivro_arq = $idlivro";
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
