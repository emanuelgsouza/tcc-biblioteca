<?php
$titulo = "Registrar Empréstimo ou Devolução Pessoa"; // Título da pagina

// Incluindo o cabecalho
require_once("../../php/header.php");
?>
<button class="bt-voltar" onclick="window.location.href = 'menu_pessoas.html'"> Voltar </button>
<h2> Registrar empréstimo ou devolução </h2>
<form method="post" class="form_pesquisar" action="../../php/arq_pessoas/pesquisa_pessoa.php" onsubmit="return validar()">
    <fieldset>
        <legend> Pesquisar </legend>
            <label> Informe o nome da pessoa para o sistema </label>
            <div>
                <input type="text" placeholder="Faça a sua busca" name="nome" size="35" maxlength="15" autofocus id="query">
                <button class="bt_pesquisa confirm"> Pesquisar </button>
            <div>
    </fieldset>
</form>
<script>
function validar(){
    var query = document.getElementById("query").value.toUpperCase();
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