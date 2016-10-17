<?php
  // Arquivo que ira buscar os livros e retornar os dados

  //Requerindo os arquivos
  require "../funcoes.php";

  // Chamando a função de conexão
  $con = conectaDB();
  if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

  if(!empty($_GET["query"])){
      $titulo = $_GET["query"];
      $q   = "SELECT titulo, cod_livro, estoque FROM livros WHERE titulo LIKE '%$titulo%'";
      $sel = executaQuery($con, $q);
      $c   = mysqli_num_rows($sel);
      if($c != 0){
          $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
          for($x = 0; $x < count($data); $x++){
              $valor = $data[$x]['titulo'];
              $cod = $data[$x]['cod_livro'];
              $estoque = $data[$x]['estoque'];
              echo "<input type='radio' name='escolha' value='$cod' id='$cod' onchange='respondeEmprestimo(this.value)'> <label for='$cod' class='escolha'> $valor | Estoque: $estoque </label>";
              echo "<div id='mostrarDadosLivro'></div>";
          }
      }else{
        echo "<p> O livro $titulo não está registrado no banco de dados!</p>";
      }
    }

   fechaDB($con);
?>
