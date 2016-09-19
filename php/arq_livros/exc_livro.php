<?php
$title = "Confirmar Exclusão";
require_once("../header_php.php");
?>
    <div class="interface">
       <button class="bt-voltar" onclick="window.location.href = '../../html/livros/form_excluir_livro.php'"> Voltar </button>
        <div class="result">
            <form method="get">
            <?php
            // Arquivo responsável por adicionar os alunos no banco de dados

            //Requerindo os arquivos
            require "../funcoes.php";
            
            // Chamando a função de conexão
            $con = conectaDB();
            if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
            
            // Caso você venha do arquivo excluir_livro
            if(isset($_GET["esc"])){
                $titulo = $_GET["esc"];
                $result = ["idlivro", "titulo", "autor", "editora", "genero", "didatico", "cod_livro", "estoque"];
                // Mostrando os registros para o usuário
                echo "<p> Os registros do livro são: </p>";
                $query = "SELECT * FROM livros WHERE titulo LIKE '$titulo'";
                $sel   = executaQuery($con, $query);
                $c     = mysqli_num_rows($sel);
                if($c >= 1){
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    for($x = 0; $x < count($result); $x++){
                        $a = $data[0][$result[$x]];
                        $b = ucwords($result[$x]);
                        echo "<p> $b : <span class='confirm'>$a</span> </p>";
                    }
                    echo "<button type='submit' name='exclusao' value='$titulo' class='bt-result'> Excluir o registro </button>";
                }
            }
            
            // Caso você va excluir o livro de fato
            if(isset($_GET["exclusao"])){
                $escolha = $_GET["exclusao"];
                $query = "DELETE FROM livros WHERE titulo LIKE '$escolha'";
                $sel   = executaQuery($con, $query);
                if($sel){
                    echo "<p> Deletado o registro do livro <span class='confirm'>$escolha</span>";
                }else{"<p> Não deletado o registro de <span class='alert'> $escolha </span>, por favor, contactar o administrador do sistema</p>";}
            }
                
            // Fechando a conexão
            fechaDB($con);
            ?>
            </form>
        </div>
    </div>
</body>
</html>