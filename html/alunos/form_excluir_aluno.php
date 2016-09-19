<?php
$titulo = "Excluir Aluno"; // Título da pagina

// Incluindo o cabecalho
require_once("../../php/header.php");
?>
<button class="bt-voltar" onclick="window.location.href = 'menu_aluno.html'"> Menu </button>
<h2> Excluir aluno do cadastro </h2>
<form method="post" class="form_pesquisar" action="../../php/arq_alunos/excluir_aluno.php" onsubmit="return validar()">
<fieldset>
<legend> Exclusão </legend>
    <label> Informe o nome do aluno para o sistema </label>
    <div>
       <input type="text" placeholder="Faça a sua busca" name="nome" maxlength="15" size="35" autofocus id="query">
       <button class="bt_pesquisa confirm"> Pesquisar </button>
    </div>
</fieldset>
</form>
<script>
function validar(){
var query = document.getElementById("query").value;
if(!isNaN(query)){
alert("Digite corretamente o nome, voce digitou: " + query);
document.getElementById("query").focus();
return false;
}else{return true;}
}
</script>
<?php
// Incluindo o footer
require_once("../../php/footer.php");
?>