<?php
$title = "Excluir livro";
require_once("../header_php.php");
?>
    <div class="interface">
       <button class="bt-voltar" onclick="window.location.href = '../../html/livros/form_excluir_livro.php'"> Voltar </button>
        <div class="result">
            <form method="get" action="exc_livro.php">
            <?php
            // Arquivo responsável por adicionar os alunos no banco de dados

            //Requerindo os arquivos
            require "../funcoes.php";

            // Recuperando as variáveis do método POST
            $titulo      = isset($_POST["titulo"])?$_POST["titulo"]:"";
            $titulo      = strtoupper($titulo);
			$autor       = isset($_POST["autor"])?$_POST["autor"]:"";
            $genero      = isset($_POST["genero"])?$_POST["genero"]:"";
            $escola      = isset($_POST["escola"])?$_POST["escola"]:"";
            $didatico    = isset($_POST["didatico"])?$_POST["didatico"]:"";

            // Chamando a função de conexão
            $con = conectaDB();
            if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
			
            // Primeiro, preciso saber se o usuário está requisitando um titulo ou autor
			if($titulo != ""){ // caso seja título
				$q   = "SELECT * FROM livros WHERE titulo LIKE '%$titulo%'";
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
				}else{echo "<p> Este livro não está registrado no banco de dados!</p>";}
			}else{// caso seja autor
				$q   = "SELECT titulo FROM livros WHERE autor LIKE '%$autor%'";
				$sel = executaQuery($con, $q);
				$c   = mysqli_num_rows($sel);
				if($c != 0){
					echo "<p> O(s) livro(s) de <span class='confirm'> $autor </span> são: </p>";
					$data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
					for($x = 0; $x < count($data); $x++){
						$valor = $data[$x]['titulo'];
						echo "<button type='submit' name='esc' value='$valor' class='bt-result'> $valor</button>";
					}
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