<?php
$title = "Dados Adicionados ao Cadastro";
require_once("../header_php.php");
?>
    <div class="interface">
       <button onclick="window.location.href='../../html/pessoas/form_adicionar_pessoa.php'" class="bt-voltar">Voltar</button>
        <div class="result">
            <?php
            // Arquivo responsável por adicionar os alunos no banco de dados

            //Requerindo os arquivos
            require "../funcoes.php";

            // Recuperando as variáveis do método POST
            $nome        = $_POST["nome"];
            $nome        = limparNome($nome);
            $rua         = (empty($_POST["rua"])) ? 'null': $_POST["rua"];
            $complemento = (empty($_POST["complemento"])) ? 'null' : $_POST["complemento"];
            $bairro      = (empty($_POST["bairro"])) ? 'null' : $_POST["bairro"];
            $telefone    = (empty($_POST["telefone"])) ? 'null' : $_POST["telefone"];
            $celular     = (empty($_POST["celular"])) ? 'null' : $_POST["celular"];

            // Chamando a função de conexão
            $con = conectaDB();
            if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
            
            // Verificando se a pessoa conta no banco de dados
            $verif = pesquisaIndividuo($con, $nome, false);
            $c     = mysqli_num_rows($verif);
            if(!($c >= 1)){
                // Chamando função para inserção de dados no banco de dados de alunos não matriculados
                $endereco = "$rua - $complemento  - $bairro";
                $endereco = limparNome($endereco);
                $q = "INSERT INTO naoalunos (nome, telefone1, telefone2, endereco) VALUES ('$nome', '$telefone', '$celular', '$endereco')";
                $db = executaQuery($con, $q);
                if($db){
                    echo "<p> Houve a inserção dos seguintes dados: </p>";
                    echo "<ul>
                            <li> Nome: <span class='confirm'>$nome</span> </li>
                            <li> Endereço: <span class='confirm'>$endereco</span> </li>
                            <li> Telefone: <span class='confirm'>$telefone</span> </li>
                            <li> Celular: <span class='confirm'>$celular</span> </li>
                          </ul>";
                }else{
                    echo "Não houve a inserção dos dados <br>";
                    die(mysqli_error($con));
                }
            }else{ //Caso a pessoa já esteja registrado, mensagem de erro
                    echo "<p> O registro de <span class='alert'> $nome </span> já existe no banco de dados de nao alunos </p>";
            }
            // Fechando a conexão
            fechaDB($con);
            ?>
        </div>
    </div>
</body>
</html>