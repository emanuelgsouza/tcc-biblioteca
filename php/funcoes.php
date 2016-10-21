<?php
//Arquivo de funções que serão utilizadas em todo o site

// Requisitanto as constantes
require "constantes.php";

// Função que fecha a conexão
function fechaDB($con){
	mysqli_close($con) or die(mysqli_error($con));
}

// Conexão ao banco de dados
function conectaDB(){
	$con = mysqli_connect(HOST, USER, PW, BANCO);
	return $con;
}

// Função que insere os dados
function executaQuery($con, $q){
	$db = mysqli_query($con, $q);
	return $db;
}

// Função para tirar espaços antes e depois da string e colocá-la em maíuscula
function retornaString($string){
  $string = trim($string);
  $string = strtoupper($string);
  return $string;
}

// Função que pesquisa se é aluno ou não e vê se o indivíduo está no banco de dados
function pesquisaIndividuo($con, $nome, $turma = 1000){
  if($x and $turma != 1000){
    $query = "SELECT aluno FROM alunos_matriculados WHERE aluno LIKE '%$nome%' and turma LIKE '$turma'";
  } else {
    $query = "SELECT nome FROM naoalunos WHERE nome LIKE '%$nome%'";
  }
  $sel   = mysqli_query($con, $query);
  return $sel;
}

// Função que verifica se é livro ou arquivo morto e depois pesquisa se o mesmo está no banco de dados
function pesquisaLivro($con, $titulo, $tipo = 1){
  if($tipo === 1){
    $query = "SELECT titulo FROM livros WHERE titulo LIKE '%$titulo%'";
    $sel   = mysqli_query($con, $query);
  }else{
    $query = "SELECT titulo FROM arquivo_morto WHERE titulo LIKE '%$titulo%'";
    $sel   = mysqli_query($con, $query);
  }
  return $sel;
}

// Função que verifica se o livro está com o mesmo código
function pesquisaCod($con, $cod_book){
  $query = "SELECT * FROM livros WHERE cod_livro = $cod_book";
  $sel = mysqli_query($con, $query);
  return $sel;
}

// Função que retorna o genero literário a partir da sigla
function retornaGenero($string) {
	switch ($string) {
		case 'a':
			return "Aventura";
			break;

		case 'rm':
			return "Romance";
			break;

		case 'f':
			return "Ficção";
			break;

		case 'tr':
			return "Terror";
			break;

		case 's':
			return "Suspense";
			break;

		case 'rp':
			return "Romance Policial";
			break;

		case 'p':
			return "Poesia";
			break;

		case 't':
			return "Teatro";
			break;

		default:
			return "Nenhum";
			break;
	}
}

// Função que retorna o escola literária a partir da sigla
function retornaEscola($string) {
	switch ($string) {
		case 'c':
			return "Clássico";
			break;

		case 'h':
			return "Humanismo";
			break;

		case 'li':
			return "Literatura de Informação";
			break;

		case 't':
			return "Trovadorismo";
			break;

		case 'a':
			return "Arcadismo";
			break;

		case 'b':
			return "Barroco";
			break;

		case 'rm':
			return "Romantismo";
			break;

		case 'r':
			return "Realismo";
			break;

		case 's':
			return "Simbolismo";
			break;

		case 'pem':
			return "Pré-Modernismo";
			break;

		case 'm':
			return "Modernismo";
			break;

		case 'pom':
			return "Pós-Modernismo";
			break;

		default:
			return "Nenhum";
			break;
	}
}

// Função que retorna categoria didática a partir da sigla
function retornaDidatico($string) {
	switch ($string) {
		case 'fs':
			return "Filosofia e Sociologia";
			break;

		case 'mf':
			return "Matemática e Física";
			break;

		case 'pl':
			return "Português e Literatura";
			break;

		case 'b':
			return "Biologia e Química";
			break;

		case 'h':
			return "História";
			break;

		case 'g':
			return "Geografia";
			break;

		case 'p':
			return "Pedagógicos";
			break;

		case 'e':
			return "Enciclopédia";
			break;

		case 'd':
			return "Dicionários";
			break;

		default:
			return "Nenhum";
			break;
	}
}
?>
