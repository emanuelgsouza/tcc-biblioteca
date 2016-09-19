<?php
$title = "Registrar Empréstimo";
require_once("../header_php.php");
?>
<div class="interface">
   <button class="bt-voltar" onclick="window.location.href = '../../html/alunos/form_pesquisar_aluno.php'"> Voltar </button>
    <div class="result">
        <form method="get">
        <?php
        // Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

        //Requerindo os arquivos
        require "../funcoes.php";

        // Chamando a função de conexão
        $con = conectaDB();
        if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

        // Primeiro momento: o se pesquisará qual livro que está sendo emprestado
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $q = "SELECT aluno, turma FROM alunos_matriculados WHERE idaluno lIKE '$id'";
            $sel = executaQuery($con, $q);
            if(mysqli_num_rows($sel) != 0){
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                echo "<p> Registrando empréstimo do aluno(a) <span>" . $data[0]["aluno"] . "</span> da turma <span>" . $data[0]["turma"] . "</span></p>";
                echo "<label> Digite o título completo do livro </label>";
                echo "<div class='block'>";
                echo "<input type='text' name='pesquisa' autofocus>";
                echo "<button type='submit' name='sub' value='$id' class='bt-menor'> Pesquisar </button>";
                echo "</div>";
            }else{}
        }else{}

        // Pesquisando o livro de fato
        if(isset($_GET["pesquisa"])){
            $pesq = $_GET["pesquisa"];
            $id   = $_GET["sub"];

            // Mostrando para qual aluno está sendo emprestado
            $q = "SELECT aluno, turma FROM alunos_matriculados WHERE idaluno lIKE '$id'";
            $sel = executaQuery($con, $q);
            $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
            echo "<p> Registrando empréstimo do aluno(a) <span>" . $data[0]["aluno"] . "</span> da turma <span>" . $data[0]["turma"] . "</span></p>";

            // Mostrando o livro pesquisado
            $q    = "SELECT idlivro,titulo, autor, estoque FROM livros WHERE titulo LIKE '$pesq'";
            $sel   = executaQuery($con, $q);
            if(mysqli_num_rows($sel) != 0){ // Se o livro existe
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                $estoque = $data[0]["estoque"];
                if($estoque != 0){ // Conferindo se o livro está no estoque
                    $idlivro = $data[0]["idlivro"];
                    $titulo  = $data[0]["titulo"];
                    echo "<p> O resultado da busca foi </p>";
                    echo "<p> Título: <span class='confirm'>" . $data[0]["titulo"] . "</span></p>";
                    echo "<p> Autor: <span class='confirm'>" . $data[0]["autor"] . "</span></p>";
                    echo "<button type='submit' name='escolha' value='ID: $id - IdLivro: $idlivro' formaction='registro_final.php' class='bt-result'> Solicitar empréstimo </button>";
                }else{
                    echo "<p> O livro não pode ser emprestado por que não há mais em estoque";
                }
            }else{// se o livro não existe
                echo "<p> O livro <span class='alert'> $pesq </span> não existe no banco de dados </p>";
                echo "<button type='submit' name='id' value='$id' class='bt-result'> Voltar a pesquisa do livro </button>";
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