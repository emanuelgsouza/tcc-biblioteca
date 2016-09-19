<?php
$title = "Registrar Devolução";
require_once("../header_php.php");
?>
    <div class="interface">
       <button class="bt-voltar" onclick="window.location.href = '../../html/pessoas/form_pesquisar_pessoa.php'"> Voltar </button>
        <div class="result">
            <form method="get">
            <?php
            // Arquivo responsável por pesquisar e fazer as modificações necessárias no banco de dados

            //Requerindo os arquivos
            require "../funcoes.php";
                
            // Chamando a função de conexão
            $con = conectaDB();
            if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
            
            // Primeiro momento: o se pesquisará qual livro que está sendo emprestado
            if(isset($_GET["id"])){
                $string = $_GET["id"];
                $x = retornaIdIdreg($string);
                $id = $x[0]; // pegando o id da pessoa
                $idreg = $x[1]; // pegando o id do registro
                $q = "SELECT nome FROM naoalunos WHERE idnaluno lIKE '$id'";
                $sel = executaQuery($con, $q);
                if(mysqli_num_rows($sel) != 0){
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    echo "<p> Registrando devolução de <span>" . $data[0]["nome"] . "</span></p>";
                    echo "<p> Dados do empréstimo </p>";
                    $q  = "SELECT r.idlivro, r.data, l.titulo, l.autor FROM regnaoalunos as r JOIN livros as l ON r.idlivro = l.idlivro WHERE idregistro = '$idreg'";
                    $sel  = executaQuery($con, $q);
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    $dia = strtotime($data[0]["data"]);
                    $dia = date("d-m-Y", $dia);
                    $string = $id . "+" . $data[0]["idlivro"];
                    echo "<p> Data: <span class='confirm'>" . $dia . " </span></p>";
                    echo "<p> Título: <span class='confirm'>" . $data[0]["titulo"] . " </span></p>";
                    echo "<p> Autor: <span class='confirm'>" . $data[0]["autor"] . " </span></p>";
                    echo "<button type='submit' name='confirm' value='$string' class='bt-result'> Confirmar </button>";
                    }else{}
            }else{}
                
            if(isset($_GET["confirm"])){ // Fazer o registro da devolução e renovando o estoque
                $string = $_GET["confirm"];
                $x = retornaIdIdreg($string);
                $id = $x[0]; // pegando o id da pessoa
                $idlivro = $x[1]; // pegando o id do livro
                $date = date("20y-m-d");
                // Registrando o empréstimo
                $q = "INSERT INTO regnaoalunos (data, situacao, idnaluno, idlivro) VALUES ('$date', 'd', '$id', '$idlivro')";
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
                    echo "<p> Foi registrado a devolução do livro <span class='confirm'> $titulo </span> a pessoa <span class='confirm'> $nome </span>";
                    
                    // Recuperando o estoque
                    $q = "SELECT estoque FROM livros WHERE idlivro = '$idlivro'";
                    $sel = executaQuery($con, $q);
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    $est = $data[0]["estoque"];
                    
                    // Aumentando o estoque
                    $q = "UPDATE livros SET estoque = $est+1 WHERE idlivro = '$idlivro'";
                    $sel = executaQuery($con, $q);
                    
                    // Colocando o registro na tabela de registro de livros
                    $q = "INSERT INTO reglivros (idreg, idlivro, data, situacao) VALUES (DEFAULT, '$idlivro', '$date', 'd class='confirm'')";
                    $sel = executaQuery($con, $q);
                }else{
                    echo "<p> Não foi possivel registrar a devolução </p>";
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