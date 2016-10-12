<?php
  // Arquivo para adicionar livros ao banco de dados
  require "../funcoes.php";

  // Pegando as variáveis do método POST
  $titulo   = isset($_GET["titulo"])?$_GET["titulo"]:"";
  $titulo   = strtoupper($titulo);
  $autor    = isset($_GET["autor"])?$_GET["autor"]:"";
  $autor    = strtoupper($autor);
  $editora  = isset($_GET["editora"])?$_GET["editora"]:"";
  $editora  = strtoupper($editora);
  $genero   = isset($_GET["genero"])?$_GET["genero"]:"n";
  $genero   = strtoupper($genero);
  $escola   = isset($_GET["escola"])?$_GET["escola"]:"n";
  $escola   = strtoupper($escola);
  $didatico = isset($_GET["didatico"])?$_GET["didatico"]:"n";
  $didatico = strtoupper($didatico);
  $estoque  = isset($_GET["estoque"])?$_GET["estoque"]:"0";
  $estante  = isset($_GET["estante"])?$_GET["estante"]:"0";
  $prateleira = isset($_GET["prateleira"])?$_GET["estante"]:"0";
  $cod_book = isset($_GET["cod_livro"])?$_GET["cod_livro"]:"0";
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
      echo "O código <span class='txt-alert'>$cod_book</span> já tem um dono! Por favor, insira um outro número";
  }
  // Fechando a conexão
  fechaDB($con);
?>
