<?php
$title = "Pesquisar Pessoa";
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
            if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
                
            if(isset($_POST["nome"])){
                $nome = $_POST["nome"];
                $q   = "SELECT nome, telefone2 FROM naoalunos WHERE nome LIKE '%$nome%'";
                $sel = executaQuery($con, $q);
                $c   = mysqli_num_rows($sel);
                if($c != 0){
                    echo "<p>Esta solicitação retornou " . $c . " registros</p>";
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    for($x = 0; $x < count($data); $x++){
                        $valor = $data[$x]["nome"] . " | " . $data[$x]["telefone2"];
                        echo "<input type='submit' value='$valor' name='escolha'> </input>";
                    }
                }else{echo "<p> Este nome não está registrado no banco de dados de alunos!</p>";}
            }else{}
            
            // Para parte de registro de devolução ou empréstimo de determinado livro
            if(isset($_GET["escolha"])){
                $esc1 = $_GET["escolha"];
                $esc1 = cortaString($esc1);
                $q   = "SELECT * FROM naoalunos WHERE nome LIKE '$esc1'";
                $sel = executaQuery($con, $q);
                if(mysqli_num_rows($sel) != 0){
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    echo "<p> Resultados </p>";
                    echo "<p> Nome: <span class='confirm'>" . $data[0]['nome'] . "</span></p>";
                    echo "<p> Endereço: <span class='confirm'>" . $data[0]['endereco'] . "</span></p>";
                }
                $id = $data[0]["idnaluno"]; // Pegando o id da pessoa
                $q  = "SELECT MAX(idregistro), r.data, r.situacao, p.nome, l.titulo, l.autor FROM regnaoalunos as r JOIN naoalunos as p ON r.idnaluno = p.idnaluno JOIN livros as l ON r.idlivro = l.idlivro WHERE r.idnaluno = '$id' AND idregistro = (SELECT MAX(idregistro) FROM regnaoalunos WHERE idnaluno = '$id')";
                $sel  = executaQuery($con, $q);
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                $situacao = $data[0]["situacao"];
                $idreg = $data[0]["MAX(idregistro)"];
                if($situacao === "e"){
                    echo "<p> Há um livro emprestado </p>";
                    echo "<ul>
                            <li> Título: <span class='confirm'>" . $data[0]["titulo"] . "</span> </li>
                            <li> Autor: <span class='confirm'>" . $data[0]["autor"] . "</span> </li>
                          </ul>";
                    echo "<button type='submit' value='$id+$idreg' class='bt-result' formaction='registrar_devolucao.php' name='id'> Registrar devolução </button>";
                }else{
                    echo "<form method='get'>";
                    echo "<button type='submit' value='$id' class='bt-result' formaction='registrar_emprestimo.php' name='id'> Registrar empréstimo </button>";
                    echo "</form>";
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