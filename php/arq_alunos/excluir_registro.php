<?php

// Arquivo que irá mostrar os dados e excluí-los

require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Caso o formulário venha do arquivo excluir aluno
if(isset($_GET["idaluno"])){
  $escolha = $_GET["idaluno"];

  // Mostrar os dados do usuário
  $query = "SELECT * FROM alunos_matriculados WHERE idaluno = $escolha";
  $sel   = executaQuery($con, $query);
  $c   = mysqli_num_rows($sel);
  if($c != 0){
    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
      echo "<p> Nome : <span class='txt-confirm'>" . $data[0]['aluno'] ."</span> </p>";
      echo "<p> Turma : <span class='txt-confirm'>" . $data[0]['turma'] ."</span> </p>";
  }
}

// Excluindo o dado do aluno
if(isset($_GET["idAluno"])){
  $esc   = $_GET["idAluno"];
  $query = "SELECT aluno, turma FROM alunos_matriculados WHERE idaluno = $esc";
  $sel   = executaQuery($con, $query);
  $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
  $nome = $data[0]["aluno"];
  $turma = $data[0]["turma"];

  // Primeiro é necessário excluir as referências em outras tabelas
  $query = "DELETE FROM regalunos WHERE idaluno = $esc";
  $sel   = executaQuery($con, $query);

  $query = "DELETE FROM alunos_matriculados WHERE idaluno = $esc";
  $sel   = executaQuery($con, $query);
  if($sel){
      echo "<p> Você deletou o registro de <span class='txt-confirm'>$nome</span> da turma <span class='txt-confirm'>$turma</span> </p>";
  }else{
      echo "<p> Você não conseguiu deletar o registro de <span class='txt-alert'>$nome</span> da turma <span class='txt-alert'>$turma</span> </p>";
  }
}

// Fechando a conexão
fechaDB($con);
?>
