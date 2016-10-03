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
		if(isset($_GET["diasAluno"])){
		  $op = $_GET["diasAluno"];
			$qtn = $_GET["quantidade"];
		  $periodo = date('Y/m/d', strtotime('-30 days'));

		  // Caso a pessoa deseja saber os inadimplentes a mais do que 30 dias
		  if($op === 1){
		      $q = "SELECT c.aluno, d.titulo, b.data FROM regalunos as b join alunos_matriculados as c on b.idaluno = c.idaluno join livros as d on b.idlivro = d.idlivro where situacao LIKE 'e' and data < '$periodo' and not EXISTS (select idaluno from regalunos as a where situacao like 'd' and b.idaluno= a.idaluno) LIMIT $qtn";
		  }
		  //Caso os inadimplentes à dias
		  else{
		      $q = "SELECT c.aluno, d.titulo, b.data FROM regalunos as b join alunos_matriculados as c on b.idaluno = c.idaluno join livros as d on b.idlivro = d.idlivro where situacao LIKE 'e' and data > '$periodo' and not EXISTS (select idaluno from regalunos as a where situacao like 'd' and b.idaluno = a.idaluno) LIMIT $qtn";
		  }

		  $sel = executaQuery($con, $q);

		  //Caso a query retorne registros
		  if(mysqli_num_rows($sel) != 0){
		      echo "<table>";
		      $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
		      for ($x = 0; $x < count($data); $x++){
		          echo "<tr>";
		              echo "<td>" . $data[$x]["aluno"] . "</td>";
		              echo "<td>" . $data[$x]["titulo"] . "</td>";
		              echo "<td>" . date('d/m', strtotime($data[$x]["data"])) . "</td>";
		          echo "</tr>";
		      }
		      echo "</table>";
		  }else{
		      //Caso não retorne
		      echo "<p> Não há alunos inadimplentes </p>";
		  }
		}else{
		  $op = $_GET["diasPessoa"];
			$qtn = $_GET["quantidade"];
		  $periodo = date('Y/m/d', strtotime('-30 days'));

		  // Caso a pessoa deseja saber os inadimplentes a mais do que 30 dias
		  if($op === 1){
		      $q = "SELECT c.nome, d.titulo, b.data FROM regnaoalunos as b join naoalunos as c on b.idnaluno = c.idnaluno join livros as d on b.idlivro = d.idlivro where situacao LIKE 'e' and data < '$periodo' and not EXISTS (select idnaluno from regnaoalunos as a where situacao like 'd' and b.idnaluno = a.idnaluno) LIMIT $qtn";
		  }
		  //Caso os inadimplentes à dias
		  else{
		      $q = "SELECT c.nome, d.titulo, b.data FROM regnaoalunos as b join naoalunos as c on b.idnaluno = c.idnaluno join livros as d on b.idlivro = d.idlivro where situacao LIKE 'e' and data > '$periodo' and not EXISTS (select idnaluno from regnaoalunos as a where situacao like 'd' and b.idnaluno = a.idnaluno) LIMIT $qtn";
		  }

		  $sel = executaQuery($con, $q);
		  //Caso a query retorne registros
		  if(mysqli_num_rows($sel) != 0){
		      echo "<table>";
		      echo "<th>";
		          echo "<td> Nome </td>";
		          echo "<td> Titulo </td>";
		          echo "<td> Data </td>";
		      echo "</th>";
		      $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
		      for ($x = 0; $x < count($data); $x++){
		          echo "<tr>";
		              echo "<td>" . $data[$x]["nome"] . "</td>";
		              echo "<td>" . $data[$x]["titulo"] . "</td>";
		              echo "<td>" . date('d/m', strtotime($data[$x]["data"])) . "</td>";
		          echo "</tr>";
		      }
		      echo "</table>";
		  }else{
		      //Caso não retorne
		      echo "<p> Não há pessoas inadimplentes </p>";
		  }
		}
		?>

	</body>
</html>
