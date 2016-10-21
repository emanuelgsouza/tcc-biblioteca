<?php
// Arquivo responsável por adicionar os alunos no banco de dados

//Requerindo os arquivos
require "../funcoes.php";

// Recuperando as variáveis do método POST
$nome        = $_GET["nome"];
$nome        = retornaString($nome);
$rua         = (empty($_GET["rua"])) ? 'null': $_GET["rua"];
$complemento = (empty($_GET["complemento"])) ? 'null' : $_GET["complemento"];
$bairro      = (empty($_GET["bairro"])) ? 'null' : $_GET["bairro"];
$telefone    = (empty($_GET["telefone"])) ? 'null' : $_GET["telefone"];
$celular     = (empty($_GET["celular"])) ? 'null' : $_GET["celular"];

// Chamando a função de conexão
$con = conectaDB();
if(!$con){echo "Não houve conexão";	die(mysqli_error($con));}

// Verificando se a pessoa conta no banco de dados
$verif = pesquisaIndividuo($con, $nome, false);
$c     = mysqli_num_rows($verif);
if(!($c >= 1)){
    // Chamando função para inserção de dados no banco de dados de alunos não matriculados
    $endereco = "$rua - $complemento  - $bairro";
    $endereco = retornaString($endereco);
    $q = "INSERT INTO naoalunos (nome, telefone1, telefone2, endereco) VALUES ('$nome', '$telefone', '$celular', '$endereco')";
    $db = executaQuery($con, $q);
    if($db){
        echo "Houve a inserção dos dados";
    }else{
        echo "Não houve a inserção dos dados";
        die(mysqli_error($con));
    }
}else{ //Caso a pessoa já esteja registrado, mensagem de erro
        echo "O registro de <span class='txt-alert'>$nome</span> já existe no banco de dados de nao alunos";
}
// Fechando a conexão
fechaDB($con);
?>
