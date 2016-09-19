<?php
$title = "Excluir Pessoa";
require_once("../header_php.php");
?>
	<div class="interface">
        <button class="bt-voltar" onclick="window.location.href = '../../html/pessoas/form_excluir_pessoa.php'"> Voltar </button>
        <div class="result">
		<form method="get" action="">
		<?php
		
		// Arquivo que irá mostrar os dados e excluí-los
		
		require "../funcoes.php";
        
		// Chamando a função de conexão
        $con = conectaDB();
        if($con){}else {echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
		
        if(isset($_POST["escolha"])){
            $escolha = $_POST["escolha"];
            $escolha = cortaString($escolha); // Função que deixa string limpa
            // Mostrar os dados do usuário
            $query = "SELECT * FROM naoalunos WHERE nome LIKE '$escolha'";
            $sel   = executaQuery($con, $query);
            $c   = mysqli_num_rows($sel);
            if($c != 0){
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                echo "<p> Registro de $escolha </p>";
                echo "<ul>";
                echo "<li> Nome : <span class='confirm'>" . $data[0]['nome'] ."</span> </li>";
                echo "<li> Endereço : <span class='confirm'>" . $data[0]['endereco'] ."</span> </li>";
                echo "<li> Celular : <span class='confirm'>" . $data[0]['telefone1'] ."</span> </li>";
                echo "<li> Telefone : <span class='confirm'>" . $data[0]['telefone2'] ."</span> </li>";
                echo "</ul>";
                echo "<button type='submit' value='$escolha + " . $data[0]['endereco'] . "' name='esc' class='bt-result'> Excluir $escolha </button>"; // Botão que irá enviar o dado do aluno
               }else{}
		}else{}
            
		// Excluindo o dado do aluno
		if(isset($_GET["esc"])){
			$esc   = $_GET["esc"];
            $t = strpos($esc, " + ");
            $nome = substr($esc, 0, $t);
            $endereco = substr($esc, $t);
            $endereco = substr($endereco, 3);
			$query = "DELETE FROM naoalunos WHERE nome LIKE '$nome' and endereco LIKE '$endereco'";
			$sel   = executaQuery($con, $query);
			if($sel){
				echo "<p> Você deletou o registro de <span class='confirm'>$nome</span> </p>";
			}else{
				echo "<p> Não foi possível deletar o registro de <span class='alert'>$nome</span> </p>";
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