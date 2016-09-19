<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../css/style_php.css">
		<title> Formulário pessoas inadimplentes </title>
	</head>
	<body>
	<div class="interface">
		<button class="bt-voltar" onclick="window.location.href = '../../html/livros/form_pesquisar_livro.php'"> Voltar </button>
		<div class="result">
            <?php
            // Arquivo que vai gerar os livros mais lidos em um determinado período

            // Requerir os arquivos de funções
            require("../funcoes.php");

            // Conectando ao banco de dados
            $con = conectaDB();
                if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}
            
            if(isset($_POST["periodo"])){
                $op = $_POST["periodo"];
                if($op == 1){
                    $periodo = date('Y/m/d', strtotime('-60 days'));
                    $per = "Bimestre";
                }elseif($op == 2){
                    $periodo = date('Y/m/d', strtotime('-90 days'));
                    $per = "Trimestre";
                }elseif($op == 3){
                    $periodo = date('Y/m/d', strtotime('-180 days'));
                    $per = "Semestre";
                }else{
                    $periodo = date('Y/m/d', strtotime('-90 days'));
                    $per = "Ano de 2016";
                }
                
                $q = "SELECT l.titulo, count(l.idlivro) FROM livros as l join reglivros as r on l.idlivro = r.idlivro where r.situacao like 'e' and data > '$periodo' group by l.idlivro order by count(r.idlivro) desc limit 20";
                $sel = executaQuery($con, $q);
                $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                echo "<p> Os livros mais lidos no $per </p>";
                for ($x = 0; $x < count($data); $x++){
                    echo "<p> " . $data[$x]['titulo'] . "|" .  $data[$x]['count(l.idlivro)'] . " </p>";
                }
                        
            }else{
                //Caso haja algum problema
                echo "<p> Houve um problema no sistema e não conseguimos acessar o banco de dados </p>";
            }
            ?>
	    </div>
    </div>
	</body>
</html>