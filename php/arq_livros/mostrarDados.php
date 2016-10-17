<?php
// Arquivo responsável por adicionar os alunos no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Recuperando as variáveis do método POST e declarando as variáveis
$esc = isset($_GET["query"])?$_GET["query"]:"";

// Chamando a função de conexão
$con = conectaDB();
if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Mostrando os dados escolhidos
echo "<p> Os dados do livros são: </p>";
$q    = "SELECT * FROM livros WHERE cod_livro = $esc";
$sel  = executaQuery($con, $q);
$data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
echo "<p> Idlivro: <span class='txt-confirm'>" . $data[0]["idlivro"] . "</span> </p>";
echo "<p> Título: <span class='txt-confirm'>" . $data[0]["titulo"] . "</span> </p>";
echo "<p> Autor: <span class='txt-confirm'>" . $data[0]["autor"] . "</span> </p>";
echo "<p> Editora: <span class='txt-confirm'>" . $data[0]["editora"] . "</span> </p>";
echo "<p> Gênero: <span class='txt-confirm'>" . retornaGenero($data[0]["genero"]) . "</span> </p>";
echo "<p> Escola: <span class='txt-confirm'>" . retornaEscola($data[0]["escola"]) . "</span> </p>";
echo "<p> Didático: <span class='txt-confirm'>" . retornaDidatico($data[0]["didatico"]) . "</span> </p>";
echo "<p> Código do Livro: <span class='txt-confirm'>" . $data[0]["cod_livro"] . "</span> </p>";
echo "<p> Estante: <span class='txt-confirm'>" . $data[0]["estante"] . "</span> </p>";
echo "<p> Prateleira: <span class='txt-confirm'>" . $data[0]["prateleira"] . "</span> </p>";
echo "<p> Estoque: <span class='txt-confirm'>" . $data[0]["estoque"] . "</span> </p>";

// Fechando a conexão
fechaDB($con);
?>
