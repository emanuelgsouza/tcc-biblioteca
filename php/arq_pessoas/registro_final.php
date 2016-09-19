<?php
$title = "Registro Final";
require_once("../header_php.php");
?>
    <div class="interface">
       <button class="bt-voltar" onclick="window.location.href='../../html/pessoas/form_pesquisar_pessoa.php'">Voltar</button>
        <div class="result">
            <form method="get">
            <?php
            // Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

            //Requerindo os arquivos
            require "../funcoes.php";
                
            // Chamando a função de conexão
            $con = conectaDB();
            if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
            
            if(isset($_GET["escolha"])){
                $escolha = $_GET["escolha"];
                $result  = retornaIdTitulo($escolha);
                $id      = $result[0];
                $idlivro = $result[1];
                $date = date("20y-m-d");
                // Registrando o empréstimo
                $q = "INSERT INTO regnaoalunos (idregistro, data, situacao, idnaluno, idlivro) VALUES (DEFAULT, '$date', 'e', '$id', '$idlivro')";
                $sel = executaQuery($con, $q);
                if($sel){
                    // Pegando o nome do aluno
                    $q = "SELECT nome FROM naoalunos WHERE idnaluno = '$id'";
                    $sel = executaQuery($con, $q);
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    $nome = $data[0]["nome"];
                    
                    // Pegando o título do livro
                    $q = "SELECT titulo FROM livros WHERE idlivro = '$idlivro'";
                    $sel = executaQuery($con, $q);
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    $titulo = $data[0]["titulo"];
                    
                    // Mostrando que foi registrado
                    echo "<p> Foi registrado o empréstimo do livro <span class='confirm'> $titulo </span> a pessoa <span class='confirm'> $nome </span>";
                    
                    // Recuperando o estoque
                    $q = "SELECT estoque FROM livros WHERE idlivro = '$idlivro'";
                    $sel = executaQuery($con, $q);
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    $est = $data[0]["estoque"];
                    
                    // Diminuindo o estoque
                    $q = "UPDATE livros SET estoque = $est-1 WHERE idlivro = '$idlivro'";
                    $sel = executaQuery($con, $q);
                    
                    // Colocando o registro na tabela de registro de livros
                    $q = "INSERT INTO reglivros (idreg, idlivro, data, situacao) VALUES (DEFAULT, '$idlivro', '$date', 'e')";
                    $sel = executaQuery($con, $q);
                }else{
                    echo "<p> Não foi possivel registrar o empréstimo </p>";
                }
            }else{}
                
            
            // Fechando a conexão
            fechaDB($con);
            ?>
            </form>
        </div>
    </div>
</body>
</html>