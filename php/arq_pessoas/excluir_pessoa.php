<?php
$title = "Excluir Pessoa";
require_once("../header_php.php");
?>
    <div class="interface">
        <button class="bt-voltar" onclick="window.location.href ='../../html/pessoas/form_excluir_pessoa.php'"> Voltar </button>
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
                // Verificar se a pessoa consta no banco de dados e assim retornar os registros
                $q   = "SELECT nome, telefone2 FROM naoalunos WHERE nome LIKE '%$nome%'";
                $sel = executaQuery($con, $q);
                $c   = mysqli_num_rows($sel);
                if($c != 0){
                    echo "<p>Esta solicitação retornou " . $c . " registros</p>";
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    for($x = 0; $x < count($data); $x++){
                        $valor = $data[$x]["nome"] . " | " . $data[$x]["telefone2"];
                        echo "<input type='submit' value='$valor' name='escolha'>";
                    }
                }else{echo "<p> Este nome não está registrado no banco de dados de nao alunos!</p>";}
            }else{echo "<p> Você não digitou o nome da pessoa </p>";}
                
            // Fechando a conexão
            fechaDB($con);
            ?>
            </form>
        </div>
    </div>
</body>
</html>