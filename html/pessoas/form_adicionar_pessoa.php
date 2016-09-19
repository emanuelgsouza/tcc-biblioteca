<?php
$titulo = "Adicionar Pessoa"; // Título da pagina

// Incluindo o cabecalho
require_once("../../php/header.php");
?>
<button class="bt-voltar" onclick="window.location.href = 'menu_pessoas.html'"> Menu </button>
<h2> Adicionar pessoa ao cadastro </h2>
<form method="post" class="form_adicionar" onsubmit="return validar()" action="../../php/arq_pessoas/adicionar_pessoa.php">
    <fieldset>
        <legend> Informações pessoais </legend>
            <div>
                <label>Nome: </label>
                <input type="text" name="nome" placeholder="Digite o nome do aluno" maxlength="35" autofocus id="nome" required>
            </div>
    <fieldset>
        <legend>Endereço:</legend>
            <div>
                <label> Rua: </label>
                <input type="text" name="rua" placeholder="Rua nomedarua" id="endereco" required maxlength="30">
            </div>
            <div>
                <label> Complemento: </label>
                <input type="text" name="complemento" placeholder="Lote 00 Quadra 00" id="endereco" required maxlength="20">
            </div>
            <div>
                <label> Bairro: </label>
                <input type="text" name="bairro" placeholder="Digite o Bairro" id="endereco" required maxlength="15">
            </div>
    </fieldset>
        <div>
            <label> Telefone: </label>
            <input type="tel" name="telefone" placeholder="12345678" pattern="\d\d\d\d\d\d\d\d">
        </div>
        <div>
            <label> Celular: </label>
            <input type="tel" name="celular" placeholder="912345678" pattern="9\d\d\d\d\d\d\d\d">
        </div>
        <div>
            <input type="submit" value="Confirmar" class="bt confirm">
            <input type="reset" value="Limpar" class="bt alert">
        </div>
    </fieldset>
</form>
<script>
// Função que valida o formulário
function validar() {
    var none  = document.getElementById("nome").value.toUpperCase();
    if(!isNaN(nome)) {
        alert("Não é possivel digitar números no nome");
        document.getElementById("nome").focus();
        return false;
    }else{}
}
</script>
<?php
// Incluindo o footer
require_once("../../php/footer.php");
?>   