<?php
$title = "Excluir Aluno";
require_once("../header_php.php");
?>
<div class="interface">
   <button class="bt-voltar" onclick="window.location.href = '../../html/alunos/form_excluir_aluno.php'"> Voltar </button>
    <div class="result">
        <form action="excluir_registro.php" method="post">
        <?php
        // Arquivo responsável por excluir os alunos no banco de dados

        //Requerindo os arquivos
        require "../funcoes.php";

        // Chamando a função de conexão
        $con = conectaDB();
        if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

        if(isset($_POST["nome"])){
            $nome = $_POST["nome"];
            // Vamos primeiro conferir se o aluno está no banco de dados e caso esteja, mostrar os resultados da busca
            $q   = "SELECT aluno, turma FROM alunos_matriculados WHERE aluno LIKE '%$nome%'";
            $sel = executaQuery($con, $q);
            $c   = mysqli_num_rows($sel);
            if($c != 0){
                echo "<p>Esta solicitação retornou " . $c . " registros</p>";
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                for($x = 0; $x < count($data); $x++){
                    $valor = $data[$x]["aluno"] . " | " . $data[$x]["turma"];
                    echo "<input type='submit' value='$valor' name='escolha'>";
                }
            } //  caso o aluno não esteja no banco de dados
            else{echo "<p> Este nome não está registrado no banco de dados de alunos!</p>";}
        }else{echo "<p> Você não digitou o nome do aluno </p>";}

        // Fechando a conexão
        fechaDB($con);
        ?>
        </form>
    </div>
</div>
</body>
</html>