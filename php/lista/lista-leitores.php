<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../css/style_php.css">
		<title> Lista leitores </title>
	</head>
	<body>
        <button class="bt-voltar" onclick="window.location.href = '../../qg_home.html'"> Voltar </button>
        <div class="result">
            <?php
            // Arquivo que vai gerar os inadimplentes

            // Requerir os arquivos de funções
            require("../funcoes.php");

            // Conectando ao banco de dados
            $con = conectaDB();
                if(!$con){echo "<p> Não houve conexão <br> </p>";	die(mysqli_error($con));}

            // Primeiramente, preciso saber se é um aluno ou uma pessoa

            // Caso aluno
            if(isset($_POST["diasAluno"])){
                $op = $_POST["diasAluno"];
                if($op == 1){
                    $periodo = date('Y/m/d', strtotime('-30 days'));
                }else{
                    $periodo = date('Y/m/d', strtotime('-60 days'));
                }
                
                $q = "SELECT a.aluno, a.turma, count(r.idaluno) FROM regalunos as r join alunos_matriculados as a on a.idaluno = r.idaluno where r.situacao like 'e' and data > '$periodo' group by r.idaluno order by count(r.idaluno) desc";
                
                $sel = executaQuery($con, $q);
    
                //Caso a query retorne registros
                if(mysqli_num_rows($sel) != 0){
                    echo "<table>";
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    for ($x = 0; $x < count($data); $x++){
                        echo "<tr>";
                            echo "<td>" . $data[$x]["aluno"] . "</td>";
                            echo "<td>" . $data[$x]["turma"] . "</td>";
                            echo "<td>" . $data[$x]["count(r.idaluno)"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }else{
                    //Caso não retorne
                    echo "<p> Não há alunos inadimplentes </p>";
                }
            }else{
                $op = $_POST["diasPessoa"];
                
                if($op == 1){
                    $periodo = date('Y/m/d', strtotime('-30 days'));
                }else{
                    $periodo = date('Y/m/d', strtotime('-60 days'));
                }
                
                $q = "SELECT n.nome, count(r.idnaluno) FROM regnaoalunos as r join naoalunos as n on n.idnaluno = r.idnaluno where r.situacao like 'e' and data > '$periodo' group by r.idnaluno order by count(r.idnaluno) desc";
                
                $sel = executaQuery($con, $q);
                //Caso a query retorne registros
                if(mysqli_num_rows($sel) != 0){
                    $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
                    echo "<table>";
                    for ($x = 0; $x < count($data); $x++){
                        echo "<tr>";
                            echo "<td>" . $data[$x]["nome"] . "</td>";
                            echo "<td>" . $data[$x]["count(r.idnaluno)"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }else{
                    //Caso não retorne
                    echo "<p> Não há pessoas inadimplentes </p>";
                }
            }
            ?>
        </div>
	</body>
</html>