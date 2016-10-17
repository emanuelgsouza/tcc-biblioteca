<?php
// Arquivo responsável por adicionar os alunos no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Recuperando as variáveis do método POST e declarando as variáveis
$idlivro = isset($_GET["query"])?$_GET["query"]:"";

$resultados  = ["idlivro_arq", "titulo", "autor", "editora", "gaveta", "livro", "estoque"];

// Chamando a função de conexão
$con = conectaDB();
if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Mostrando os dados escolhidos
echo "<p> Os dados do livros são: </p>";
$q    = "SELECT * FROM arquivo_morto WHERE idlivro_arq = $idlivro";
$sel  = executaQuery($con, $q);
$data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
for($x = 0; $x < count($resultados); $x++){
    $a = $data[0][$resultados[$x]];
    $b = ucwords($resultados[$x]);
    echo "<p> $b : <span class='txt-confirm'> $a </span></p>";
}
echo "<button class='btn filtro' type='button' onclick='voltar()'> Voltar a pesquisa </button>";

// Fechando a conexão
fechaDB($con);
?>
