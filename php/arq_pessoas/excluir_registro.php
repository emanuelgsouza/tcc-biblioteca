<?php

// Arquivo que irá mostrar os dados e excluí-los

require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

if(isset($_GET["idpessoa"])){
  $escolha = $_GET["idpessoa"];

  // Mostrar os dados do usuário
  $q = "SELECT * FROM naoalunos WHERE idnaluno = $escolha";
  $sel   = executaQuery($con, $q);
  $c   = mysqli_num_rows($sel);
  if($c != 0){
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
    echo "<p> Nome : <span class='txt-confirm'>" . $data[0]['nome'] ."</span> </p>";
		echo "<p> Endereço : <span class='txt-confirm'>" . $data[0]['endereco'] ."</span> </p>";
		echo "<p> Turma : <span class='txt-confirm'>" . $data[0]['telefone1'] ."</span> </p>";
		echo "<p> Turma : <span class='txt-confirm'>" . $data[0]['telefone2'] ."</span> </p>";
  }
}

// Excluindo o dado do aluno
if(isset($_GET["idPessoa"])){
	$idpessoa   = $_GET["idPessoa"];

	$q = "SELECT nome FROM naoalunos WHERE idnaluno = $idpessoa";
	$sel   = executaQuery($con, $q);
	$data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
	$nome = $data[0]["nome"];

	//Excluindo as referências
	$q = "DELETE FROM regnaoalunos WHERE idnaluno = $idpessoa";
	$sel   = executaQuery($con, $q);

	$q = "DELETE FROM naoalunos WHERE idnaluno = $idpessoa";
	$sel   = executaQuery($con, $q);
	if($sel){
		echo "<p> Você deletou o registro de <span class='txt-confirm'>$nome</span> </p>";
	}else{
		echo "<p> Não foi possível deletar o registro de <span class='txt-alert'>$nome</span> </p>";
	}
}

// Fechando a conexão
fechaDB($con);
?>
