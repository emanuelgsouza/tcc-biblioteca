<?php

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Primeiro, preciso saber se o usuário está requisitando um titulo ou autor
if(isset($_GET["titulo"])){
  $titulo = $_GET["titulo"];
  $titulo = strtoupper($titulo);
  $q   = "SELECT idlivro_arq, titulo, autor FROM arquivo_morto WHERE titulo LIKE '%$titulo%'";
  $sel = executaQuery($con, $q);
  $c   = mysqli_num_rows($sel);
  if($c != 0){
    echo "<p>Selecione o livro abaixo para ver os dados dele:</p>";
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    for($x = 0; $x < count($data); $x++){
      $valor = $data[0]['titulo'] . " de " . $data[0]['autor'];
      $idlivro = $data[0]['idlivro_arq'];
      echo "<input type='radio' name='escolha' value='$idlivro' id='$idlivro' onchange='respondeChecked()'> <label for='$idlivro'> $valor </label> <br>";
    }
  } else {
    echo "<p> Este livro não está registrado no banco de dados!</p>";
  }
} else {// caso seja autor
  $autor = $_GET["autor"];
  $autor = strtoupper($autor);
  $q   = "SELECT titulo FROM arquivo_morto WHERE autor LIKE '%$autor%'";
  $sel = executaQuery($con, $q);
  $c   = mysqli_num_rows($sel);
  if($c != 0){
    echo "<p> O(s) livro(s) de $autor são: </p>";
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    echo "<table>";
    echo "<th> Título </th>";
    echo "<th> Cod_livro</th>";
    for($x = 0; $x < count($data); $x++){
        $valor = $data[$x]['titulo'];
        echo "<tr> <td> $valor </td> </tr>";
    }
    echo "</table>";
    echo "<button type='button' onclick='window.print()' class='bt confirm'> Gerar Lista </button>";
  } else {
    echo "<p> O autor $autor não está registrado no banco de dados </p>";
  }
}
// Fechando a conexão
fechaDB($con);
?>
