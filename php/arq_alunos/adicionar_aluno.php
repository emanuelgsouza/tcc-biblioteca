<?php
$title = "Dados Adicionados ao Cadastro"; // Título da página

/* Incluindo o cabecalho */
require_once("../header_php.php");
?>

<div class="interface">
   <button class="bt-voltar" onclick="window.location.href = '../../html/alunos/form_adicionar_aluno.php'"> Voltar </button>
    <div class="result">
        <?php
        // Arquivo responsável por adicionar os alunos no banco de dados

        //Requerindo os arquivos
        require "../funcoes.php";

        // Chamando a função de conexão
        $con = conectaDB();
        if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

        // Caso os dados foram enviados 
        if(isset($_POST["nome"]) and isset($_POST["turma"])){
            $nome  = $_POST["nome"];
            $nome  = limparNome($nome); // Tirando qualquer espaço entre o nome e colocando as letras em maíusculas
            $turma = $_POST["turma"];
            // Verificando se o registro do aluno está no banco de dados
            $verif = pesquisaIndividuo($con, $nome, true, $turma);
            $c     = mysqli_num_rows($verif);
            if(!($c >= 1)){
                //Chamando a função para inserção de dados no banco de dados de alunos matriculados
                $q  = "INSERT INTO alunos_matriculados (aluno, turma) VALUES ('$nome', '$turma')";
                $db = executaQuery($con, $q);
                if($db) {
                    echo "<p> Houve inserção dos seguintes dados: <br> </p>";
                    echo "<ul>
                            <li> Nome: <span class='confirm'>$nome</span> </li>
                            <li> Turma: <span class='confirm'>$turma</span> </li>
                          </ul>";
                }else{
                    echo "Não houve a inserção dos dados <br>";
                    die(mysqli_error($con));
                }
            }else{ //Caso o aluno já esteja registrado, mensagem de erro
                    echo "<p> O registro de <span class='alert'> $nome </span> já existe no banco de dados de alunos </p>";}
        }else{echo "<p> Você não entrou com os dados do aluno";}

        // Fechando a conexão
        fechaDB($con);
        ?>
    </div>
</div>
</body>
</html>