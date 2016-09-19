<?php
$title = "Gerar lista a partir da turma";
require_once("../header_php.php");
?>
<div class="interface">
   <button class="bt-voltar" onclick="window.location.href = '../../html/alunos/form_imprimir.php'"> Voltar </button>
   <div class="result">
       <?php
       //Arquivo PHP para gerar impressão a partir das turmas
       require "../funcoes.php";

       // Variavel de conexão com o banco
       $con = conectaDB();
       if(!$con){
           echo "<p> Não houve conexão com o banco de dados </p>";
       }

       // recuperar a turma
       if(isset($_POST["turma"])){
           $turma = $_POST["turma"];

           //Buscando no banco de dados a turma
           $q = "SELECT aluno FROM alunos_matriculados WHERE turma = '$turma'";
           $sel = executaQuery($con, $q);
           $c = mysqli_num_rows($sel);
           if($c != -0){
               echo "<p> Os alunos da turma $turma são </p>";
               //Abrindo a tag da tabela
               echo "<table class='impress'>";
               echo "<th> Nome </th>";
               $data = mysqli_fetch_all($sel, MYSQLI_ASSOC);
               // Colocando os dados na tabela
               for($x = 0; $x < count($data); $x++){
                   echo "<tr>
                            <td> " . $data[$x]['aluno'] . " </td>
                         </tr>";
               }
               // Fechando a tag da tabela
               echo "</table>";

               //Butao para impressão
               echo "<button type='button' onclick='window.print()' class='bt-result'> Gerar Impressão </button>'";
           }
       }
       ?>
   </div>
</div>
</body>
</html>