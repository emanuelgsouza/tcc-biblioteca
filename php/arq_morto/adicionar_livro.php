<?php
// Arquivo para adicionar livros ao banco de dados

require "../funcoes.php";

// Pegando as variáveis do método POST
$titulo   = isset($_GET["titulo"])?$_GET["titulo"]:"";
$titulo   = retornaString($titulo);
$autor    = isset($_GET["autor"])?$_GET["autor"]:"";
$autor    = retornaString($autor);
$editora  = isset($_GET["editora"])?$_GET["editora"]:"";
$editora  = retornaString($editora);
$gaveta   = isset($_GET["gaveta"])?$_GET["gaveta"]:"";
$livro    = isset($_GET["livro"])?$_GET["livro"]:"";
$estoque  = isset($_GET["estoque"])?$_GET["estoque"]:"";

// Chamando a função de conexão
$con = conectaDB();
if($con) {}else {echo "<p> Não houve conexão <br> </p>";die(mysqli_error($con));}

// Caso o livro seja para um arquivo morto
$tipo   = 0;
$verif = pesquisaLivro($con, $titulo, $tipo);
$c     = mysqli_num_rows($verif);
if(!($c >= 1)){
    //Chamando a função para inserção de dados no banco de dados
    $q  = "INSERT INTO arquivo_morto (titulo, autor, editora, gaveta, livro, estoque) VALUES ('$titulo', '$autor', '$editora', '$gaveta', '$livro', '$estoque')";
    $db = executaQuery($con, $q);
    if($db) {
        echo "Houve inserção dos dados";
    }
    else {
        echo "Não houve a inserção dos dados";
        die(mysqli_error($con));
    }
}else{
    echo "O registro de <span class='txt-alert'>$titulo</span> já existe no banco de dados de livros";
}

// Fechando a conexão
fechaDB($con);
?>
