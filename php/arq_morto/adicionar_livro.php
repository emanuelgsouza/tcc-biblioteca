<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Dados Adicionados ao cadastro </title>
    <link rel="stylesheet" href="../../css/style_php.css" />
</head>
<body>
    <div class="interface">
       <button class="bt-voltar" onclick="window.location.href = '../../html/arq_morto/form_adicionar_arq_morto.html'"> Voltar </button>
        <div class="result">
            <?php
            // Arquivo para adicionar livros ao banco de dados

            require "../funcoes.php";

            // Pegando as variáveis do método POST
            $titulo   = isset($_POST["titulo"])?$_POST["titulo"]:"";
            $titulo   = strtoupper($titulo);
			$autor    = isset($_POST["autor"])?$_POST["autor"]:"";
            $autor    = strtoupper($autor);
			$editora  = isset($_POST["editora"])?$_POST["editora"]:"";
            $editora  = strtoupper($editora);
			$gaveta   = isset($_POST["gaveta"])?$_POST["gaveta"]:"";
            $livro    = isset($_POST["livro"])?$_POST["livro"]:"";
            $estoque  = isset($_POST["estoque"])?$_POST["estoque"]:"";
            
            // Chamando a função de conexão
            $con = conectaDB();
            if($con) {}else {echo "<p> Não houve conexão <br> </p>";die(mysqli_error($con));}
            
            // Caso o livro seja para um arquivo morto
            $tipo   = 0;
            $verif = pesquisaLivro($con, $titulo, $tipo);
            $c     = mysqli_num_rows($verif);
            if(!($c >= 1)){
                //Chamando a função para inserção de dados no banco de dados
                $q  = "INSERT INTO arquivo_morto (titulo, autor, editora, gaveta, livro, estoque) VALUES ('$titulo', '$autor', '$editora', '$gaveta', '$livro', '$estoque')";
                $db = executaQuery($con, $q);
                if($db) {
                    echo "<p> Houve inserção dos seguintes dados: <br> </p>";
                    echo "<ul>
                            <li> Titulo: <span>$titulo</span> </li>
                            <li> Autor: <span>$autor</span> </li>
                            <li> Editora: <span>$editora</span> </li>
                            <li> Gaveta: <span>$gaveta</span> </gaveta>
                            <li> Livro: <span>$livro</span> </li>
                            <li> Estoque: <span>$estoque</span> </li>
                          </ul>";
                }
                else {
                    echo "<p> Não houve a inserção dos dados <br> </p>";
                    die(mysqli_error($con));
                }
            }else{
                echo "<p> O registro de <span> $titulo </span> já existe no banco de dados de livros </p>";
            }
            
            // Fechando a conexão
            fechaDB($con);
            ?>
        </div>
    </div>
</body>
</html>