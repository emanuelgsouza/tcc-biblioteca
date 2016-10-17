<?php
// Arquivo responsável por adicionar os alunos no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Chamando a função de conexão
$con = conectaDB();
if(!$con) {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

// Primeiro, preciso saber se o usuário está requisitando e o que
if(!empty($_GET["titulo"])){ // caso seja título
    $titulo = strtoupper($_GET["titulo"]);
    $q   = "SELECT cod_livro, titulo, autor FROM livros WHERE titulo LIKE '%$titulo%'";
    $sel = executaQuery($con, $q);
    $c   = mysqli_num_rows($sel);
    if($c != 0){
        echo "<p>Selecione o livro abaixo para ver os dados dele:</p>";
        $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
        for($x = 0; $x < count($data); $x++){
          $valor = $data[0]['titulo'] . " de " . $data[0]['autor'];
          $cod_livro = $data[0]['cod_livro'];
          echo "<input type='radio' name='escolha' value='$cod_livro' id='$cod_livro' onchange='respondeChecked()'> <label for='$cod_livro' class='escolha'> $valor </label> <br>";
        }
    }else{echo "<p> O livro <span class='txt-alert'>$titulo</span> não está registrado no banco de dados!</p>";}

    /* Gerar lista a partir do autor */
} elseif(!empty($_GET["autor"])) {
    $autor = $_GET["autor"];
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
    }else{
        echo "<p> O autor <span class='txt-alert'>$autor</span> não está registrado no banco de dados </p>";
    }

    /* Gerar lista a partir do genero */
} elseif (!empty($_GET["genero"])){
    $genero = $_GET["genero"];
    $q   = "SELECT titulo, cod_livro FROM livros WHERE genero LIKE '$genero'";
    $sel = executaQuery($con, $q);
    $c   = mysqli_num_rows($sel);
    if($c != 0){
        echo "<p> O(s) livro(s) com o genero <span class='txt-confirm'>" . retornaGenero($genero) . "</span> são: </p>";
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
    }else{
        echo "<p> A categoria <span class='txt-alert'>$genero</span> não possui livros no banco de dados </p>";
    }

    /* Gerar lista a partir da categoria didatica */
} elseif (!empty($_GET["didatico"])){
    $didatico = $_GET["didatico"];
    $q   = "SELECT titulo, cod_livro FROM livros WHERE didatico LIKE '$didatico'";
    $sel = executaQuery($con, $q);
    $c   = mysqli_num_rows($sel);
    if($c != 0){
        echo "<p> O(s) livro(s) de <span class='txt-confirm'>" . retornaDidatico($didatico) . "</span> são: </p>";
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
    }else{
        echo "<p> A categoria <span class='txt-alert'>$didatico</span> não possui livros no banco de dados </p>";
    }

    /* Gerar lista a partir da escola literária */
} elseif (!empty($_GET["escola"])){
    $escola = $_GET["escola"];
    $q   = "SELECT titulo, cod_livro FROM livros WHERE escola LIKE '$escola'";
    $sel = executaQuery($con, $q);
    $c   = mysqli_num_rows($sel);
    if($c != 0){
        echo "<p> O(s) livro(s) de <span class='txt-confirm'>" . retornaEscola($escola) . "</span> são: </p>";
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
    }else{
        echo "<p> A categoria <span class='txt-alert'>$escola</span> não possui livros no banco de dados </p>";
    }
} else {
    echo "<p> Livro ou autor não encontrado no banco de dados <p/>";
}
// Fechando a conexão
fechaDB($con);
?>
