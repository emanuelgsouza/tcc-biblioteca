<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		// Arquivo que vai gerar os inadimplentes

		// Requerir os arquivos de funções
		require("../funcoes.php");

		// Conectando ao banco de dados
		$con = conectaDB();
		    if(!$con){echo "Não houve conexão com o banco de dados";	die(mysqli_error($con));}

		// Primeiramente, preciso saber se é um aluno ou uma pessoa

		// Caso aluno
		if(isset($_GET["turma"])){
		  $turma = $_GET["turma"];

		  $q = "SELECT aluno FROM alunos_matriculados WHERE turma = $turma";

		  $sel = executaQuery($con, $q);

		  //Caso a query retorne registros
		  if(mysqli_num_rows($sel) != 0){
		      echo "<p> Os alunos da turma $turma";
		      $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
		      for ($x = 0; $x < count($data); $x++){
		          echo "<p> " . $data[$x]["aluno"] . " </p>";
		      }

					echo "<p> Data da lista: " . date("d/m/Y") . " </p>";
		  }else{
		      //Caso não retorne
		      echo "<p> Não há alunos na turma indicada </p>";
		  }
		}
		?>

	</body>
</html>
