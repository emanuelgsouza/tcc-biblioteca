<?php
$titulo = "Excluir Pessoa"; // Título da pagina

// Incluindo o cabecalho
require_once("../../php/header.php");
?>

<button class="bt-voltar" onclick="window.location.href = 'menu_pessoas.html'"> Menu </button>
<h2> Excluir pessoa do cadastro </h2>
<form method="post" class="form_pesquisar" action="../../php/arq_pessoas/excluir_pessoa.php" onsubmit="return validar()">
    <fieldset>
        <legend> Exclusão </legend>
            <label> Informe o nome da pessoa para o sistema </label>
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