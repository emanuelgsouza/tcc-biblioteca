<?php
  // Arquivo para adicionar livros ao banco de dados
  require "../funcoes.php";

  // Pegando as variáveis do método POST
  $titulo   = isset($_POST["titulo"])?$_POST["titulo"]:"";
  $titulo   = strtoupper($titulo);
  $autor    = isset($_POST["autor"])?$_POST["autor"]:"";
  $autor    = strtoupper($autor);
  $editora  = isset($_POST["editora"])?$_POST["editora"]:"";
  $editora  = strtoupper($editora);
  $genero   = isset($_POST["genero"])?$_POST["genero"]:"nenhum";
  $genero   = strtoupper($genero);
  $escola   = isset($_POST["escola"])?$_POST["escola"]:"nenhum";
  $escola   = strtoupper($escola);
  $didatico = isset($_POST["didatico"])?$_POST["didatico"]:"nenhum";
  $didatico = strtoupper($didatico);
  $estoque  = isset($_POST["estoque"])?$_POST["estoque"]:"0";
  $cod_book = isset($_POST["cod_livro"])?$_POST["cod_livro"]:"0";
  $estante  = isset($_POST["estante"])?$_POST["estante"]:"0";
  $prateleira = isset($_POST["prateleira"])?$_POST["estante"]:"null";
  $prateleira = strtoupper($prateleira);

  // Chamando a função de conexão
  $con = conectaDB();
  if($con) {}else {echo "<p> Não houve conexão <br> </p>";die(mysqli_error($con));}

  //Verificando se o usuário não está tentando inserir um livro o mesmo código
  $verif = pesquisaCod($con, $cod_book);
  $c = mysqli_num_rows($verif);
  if(!($c >= 1)){
    // Verificando se o livro está no banco de dados
    $verif = pesquisaLivro($con, $titulo);
    $c     = mysqli_num_rows($verif);
    if(!($c >= 1)){
      //Chamando a função para inserção de dados no banco de dados
      $q  =  "INSERT INTO livros (titulo, autor, editora, genero, escola, didatico, cod_livro, estante, prateleira, estoque) VALUES ('$titulo', '$autor', '$editora', '$genero', '$escola', '$didatico', '$cod_book', '$estante','$prateleira', '$estoque')";
      $db = executaQuery($con, $q);
      if($db) {
        echo "Houve a inserção dos dados";
      }
    } else {
      echo "Não houve a inserção dos dados";
      die(mysqli_error($con));
    }
  } else {
      //Caso o livro esteja repetindo o código, sugerir o próximo número
      $cod = $cod_book + 1;
      echo "O código $cod_book já tem um dono! Por favor, insira um outro número, como o $cod para este livro";
  }
// Fechando a conexão
fechaDB($con);
?>
