<?php
// Arquivo responsável por adicionar os alunos no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Recuperando as variáveis do método POST e declarando as variáveis
$esc = isset($_GET["query"])?$_GET["query"]:"";
$resultados = ["idlivro", "titulo", "autor", "editora", "genero", "escola", "didatico", "cod_livro", "estoque"];

// Chamando a função de conexão
$con = conectaDB();
if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Mostrando os dados escolhidos
echo "<p> Os dados do livros são: </p>";
$q    = "SELECT * FROM livros WHERE cod_livro = $esc";
$sel  = executaQuery($con, $q);
$data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
for($x = 0; $x < count($resultados); $x++){
    $a = $data[0][$resultados[$x]];
    $b = ucwords($resultados[$x]);
echo "<p> $b :  $a </p>";
}

// Fechando a conexão
fechaDB($con);
?>
