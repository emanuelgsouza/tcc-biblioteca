
<?php
// Arquivo responsável por adicionar os alunos no banco de dados
//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Caso os dados foram enviados
if(isset($_GET["nome"]) and isset($_GET["turma"])){
    $nome  = $_GET["nome"];
    $nome  = retornaString($nome);
    $turma = $_GET["turma"];
    // Verificando se o registro do aluno está no banco de dados
    $verif = pesquisaIndividuo($con, $nome, true, $turma);
    $c     = mysqli_num_rows($verif);
    if(!($c >= 1)){
      //Chamando a função para inserção de dados no banco de dados de alunos matriculados
      $q  = "INSERT INTO alunos_matriculados (aluno, turma) VALUES ('$nome', '$turma')";
      $db = executaQuery($con, $q);
      if($db) {
        echo "Houve a inserção de <span class='txt-confirm'>$nome</span> da turma <span class='txt-confirm'>$turma</span> no banco de dados";
      } else {
        echo "Não houve a inserção dos dados";
        die(mysqli_error($con));
    }
  } else {
    //Caso o aluno já esteja registrado, mensagem de erro
    echo "O registro de <span class='txt-alert'>$nome</span> da turma <span class='txt-alert'>$turma</span> já existe no banco de dados de alunos";
  }
} else {
  echo "Você não entrou com os dados do aluno";
}

// Fechando a conexão
fechaDB($con);
?>
