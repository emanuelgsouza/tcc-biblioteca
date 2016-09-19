<?php
$title = "Pesquisar por Livro";
require_once("../header_php.php");
?>
<div class="interface">
    <button onclick="window.location.href='../../html/livros/form_pesquisar_livro.php'" class="bt-voltar">Voltar</button>
    <div class="result">
        <form action="mostrarDados.php" method="get">
        <?php
        // Arquivo responsável por adicionar os alunos no banco de dados

        //Requerindo os arquivos
        require "../funcoes.php";

        // Chamando a função de conexão
        $con = conectaDB();
        if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

        // Primeiro, preciso saber se o usuário está requisitando e o que
            
        if(!empty($_POST["titulo"])){ // caso seja título
            $titulo = strtoupper($_POST["titulo"]);
            $q   = "SELECT titulo, autor FROM livros WHERE titulo LIKE '%$titulo%'";
            $sel = executaQuery($con, $q);
            $c   = mysqli_num_rows($sel);
            if($c != 0){
                echo "<p>Esta solicitação retornou em " . $c . " registro(s)</p>";
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                for($x = 0; $x < count($data); $x++){
                    $valor = $data[0]['titulo'] . " de " . $data[0]['autor'];
                    $titulo = $data[0]['titulo'];
                    echo "<button type='submit' name='esc' value='$titulo' class='bt-result'> $valor</button>";
                }   
            }else{echo "<p> O livro <span class='alert'> $titulo </span> não está registrado no banco de dados!</p>";}
            
            /* Gerar lista a partir do autor */
        }elseif(!empty($_POST["autor"])){
            $autor = $_POST["autor"];
            $autor = strtoupper($autor);
            $q   = "SELECT titulo, cod_livro FROM livros WHERE autor LIKE '%$autor%'";
            $sel = executaQuery($con, $q);
            $c   = mysqli_num_rows($sel);
            if($c != 0){
                echo "<p> O(s) livro(s) de $autor são: </p>";
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                echo "<table>";
                echo "<th> Título </th>";
                echo "<th> Cod_livro</th>";
                for($x = 0; $x < count($data); $x++){
                    $valor = $data[$x]['titulo'];
                    $codlivro = $data[$x]["cod_livro"];
                    echo "<tr> <td> $valor </td> <td> $codlivro </td> </tr>";
                }
                echo "</table>";
                echo "<button type='button' onclick='window.print()' class='bt-result'> Gerar Lista </button>";
            }else{
                echo "<p> O autor <span class='alert'> $autor </span> não está registrado no banco de dados </p>";
            }
            
            /* Gerar lista a partir do genero */
        }elseif($_POST["genero"] != 'n'){
            $genero = $_POST["genero"];
            $q   = "SELECT titulo, cod_livro FROM livros WHERE genero LIKE '$genero'";
            $sel = executaQuery($con, $q);
            $c   = mysqli_num_rows($sel);
            if($c != 0){
                echo "<p> O(s) livro(s) com o genero $genero são: </p>";
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                echo "<table>";
                echo "<th> Título </th>";
                echo "<th> Cod_livro</th>";
                for($x = 0; $x < count($data); $x++){
                    $valor = $data[$x]['titulo'];
                    $codlivro = $data[$x]["cod_livro"];
                    echo "<tr> <td> $valor </td> <td> $codlivro </td> </tr>";
                }
                echo "</table>";
                echo "<button type='button' onclick='window.print()' class='bt-result'> Gerar Lista </button>";
            }else{
                echo "<p> A categoria <span class='alert'> $genero </span> não possui livros no banco de dados </p>";
            }
            
            /* Gerar lista a partir da categoria didatica */
        }elseif($_POST["didatico"] != 'n'){
            $didatico = $_POST["didatico"];
            $q   = "SELECT titulo, cod_livro FROM livros WHERE didatico LIKE '$didatico'";
            $sel = executaQuery($con, $q);
            $c   = mysqli_num_rows($sel);
            if($c != 0){
                echo "<p> O(s) livro(s) de $didatico são: </p>";
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                echo "<table>";
                echo "<th> Título </th>";
                echo "<th> Cod_livro</th>";
                for($x = 0; $x < count($data); $x++){
                    $valor = $data[$x]['titulo'];
                    $codlivro = $data[$x]["cod_livro"];
                    echo "<tr> <td> $valor </td> <td> $codlivro </td> </tr>";
                }
                echo "</table>";
                echo "<button type='button' onclick='window.print()' class='bt-result'> Gerar Lista </button>";
            }else{
                echo "<p> A categoria <span class='alert'> $didatico </span> não possui livros no banco de dados </p>";
            }
            
            /* Gerar lista a partir da escola literária */
        }elseif($_POST["escola"] != 'n'){
            $escola = $_POST["escola"];
            $q   = "SELECT titulo, cod_livro FROM livros WHERE escola LIKE '$escola'";
            $sel = executaQuery($con, $q);
            $c   = mysqli_num_rows($sel);
            if($c != 0){
                echo "<p> O(s) livro(s) de $escola são: </p>";
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                echo "<table>";
                echo "<th> Título </th>";
                echo "<th> Cod_livro</th>";
                for($x = 0; $x < count($data); $x++){
                    $valor = $data[$x]['titulo'];
                    $codlivro = $data[$x]["cod_livro"];
                    echo "<tr> <td> $valor </td> <td> $codlivro </td> </tr>";
                }
                echo "</table>";
                echo "<button type='button' onclick='window.print()' class='bt-result'> Gerar Lista </button>";
            }else{
                echo "<p> A categoria <span class='alert'> $escola </span> não possui livros no banco de dados </p>";
            }
        }else{
            echo "<p> Livro ou autor não encontrado no banco de dados <p/>";
        }
        // Fechando a conexão
        fechaDB($con);
        ?>
        </form>
    </div>
</div>
</body>
</html>