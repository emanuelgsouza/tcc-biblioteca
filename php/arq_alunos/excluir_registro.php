<?php
$title = "Excluir Registro de Aluno";
require_once("../header_php.php");
?>
<div class="interface">
   <button class="bt-voltar" onclick="window.location.href = '../../html/alunos/form_excluir_aluno.php'"> Voltar </button>
    <div class="result">
    <form method="get" action="">
    <?php

    // Arquivo que irá mostrar os dados e excluí-los

    require "../funcoes.php";

    // Chamando a função de conexão
    $con = conectaDB();
    if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

    // Caso o formulário venha do arquivo excluir aluno
    if(isset($_POST["escolha"])){
        $escolha = $_POST["escolha"];
        $escolha = cortaString($escolha); // Função que deixa string limpa
        
        // Mostrar os dados do usuário
        $query = "SELECT * FROM alunos_matriculados WHERE aluno LIKE '$escolha'";
        $sel   = executaQuery($con, $query);
        $c   = mysqli_num_rows($sel);
        if($c != 0){
            $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
            echo "<p> Registro de $escolha </p>";
            echo "<ul>";
            echo "<li> Nome : <span class='confirm'>" . $data[0]['aluno'] ."</span> </li>";
            echo "<li> Turma : <span class='confirm'>" . $data[0]['turma'] ."</span> </li>";
            echo "</ul>";
            echo "<button type='submit' value='$escolha + " . $data[0]['turma'] . "' name='esc' class='bt-result'> Excluir $escolha </button>"; // Botão que irá enviar o dado do aluno para este mesmo formulário
           }
    }

    // Excluindo o dado do aluno
    if(isset($_GET["esc"])){
        $esc   = $_GET["esc"];
        $t     = strpos($esc, " + ");
        $nome  = substr($esc, 0, $t);
        $turma = substr($esc, $t);
        $turma = substr($turma, 3);
        $query = "DELETE FROM alunos_matriculados WHERE aluno LIKE '$nome' and turma LIKE '$turma'";
        $sel   = executaQuery($con, $query);
        if($sel){
            echo "<p> Você deletou o registro de <span class='confirm'>$nome</span> </p>";
        }else{
            echo "<p> Você não conseguiu deletar o registro de <span class='alert'>$nome</span> </p>";
        }
    }

    // Fechando a conexão
    fechaDB($con);
    ?>
    </form>
    </div>
</div>
</body>
</html>