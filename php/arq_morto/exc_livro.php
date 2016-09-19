<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Dados Adicionados ao cadastro </title>
    <link rel="stylesheet" href="../../css/style_php.css" />
</head>
<body>
    <div class="interface">
       <button class="bt-voltar" onclick="window.location.href = '../../html/arq_morto/form_exc_arq_morto.html'"> Voltar </button>
        <div class="result">
            <form method="get">
            <?php
            //Requerindo os arquivos
            require "../funcoes.php";
            
            // Chamando a função de conexão
            $con = conectaDB();
            if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
            
            // Caso você venha do arquivo excluir_livro
            if(isset($_GET["esc"])){
                $titulo = $_GET["esc"];
                $result = ["idlivro_arq", "titulo", "autor", "editora", "gaveta", "livro", "estoque"];
                // Mostrando os registros para o usuário
                echo "<p> Os registros do livro são: </p>";
                $query = "SELECT * FROM arquivo_morto WHERE titulo LIKE '$titulo'";
                $sel   = executaQuery($con, $query);
                $c     = mysqli_num_rows($sel);
                if($c != 0){
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    for($x = 0; $x < count($data[0]); $x++){
                        $a = $data[0][$result[$x]];
                        $b = ucwords($result[$x]);
                        echo "<p> $b : <span>$a</span> </p>";
                    }
                    echo "<button type='submit' name='exclusao' value='$titulo' class='bt-result'> Excluir o registro </button>";
                }
            }
            
            // Caso você va excluir o livro de fato
            if(isset($_GET["exclusao"])){
                $escolha = $_GET["exclusao"];
                $query = "DELETE FROM arquivo_morto WHERE titulo LIKE '$escolha'";
                $sel   = executaQuery($con, $query);
                if($sel){
                    echo "<p> Deletado o registro do livro <span> $escolha </span>";
                }else{"Não deletado o registro";}
            }else{}
            // Fechando a conexão
            fechaDB($con);
            ?>
            </form>
        </div>
    </div>
</body>
</html>