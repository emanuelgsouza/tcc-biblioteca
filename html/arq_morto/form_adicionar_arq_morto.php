<?php
$titulo = "Adicionar Arquivo Morto"; // Título da pagina

//Incluindo o cabecalho
require_once("../../php/header.php");
?>
	
<button class="bt-voltar" onclick="window.location.href = 'menu_arquivo_morto.html'"> Menu </button>

<h2> Adicionar livro de arquivo morto ao cadastro </h2>
<form method="post" class="form_adicionar" onsubmit="return validar()" action="../../php/arq_morto/adicionar_livro.php">
<fieldset>
    <fieldset>
        <legend> Informações do livro </legend>
            <div>
                <label> Título </label>
                <input type="text" placeholder="Digite o título do livro" name="titulo" maxlength="35" autofocus id="titulo" required>
            </div>
            <div>
                <label> Autor </label>
                <input type="text" placeholder="Digite o autor do livro" name="autor" maxlength="35" id="autor" required>
            </div>
            <div>
                <label> Editora </label>
                <input type="text" placeholder="Digite o auto do livro" name="editora" maxlength="35" id="editora" required>
            </div>
    </fieldset>
    <fieldset>
        <legend> Arquivo Morto </legend>
            <div>
                 <label> Gaveta </label>
                 <input type="number" name="gaveta" min="0" value="0" maxlength="2">
            </div>
            <div>
                 <label> Livro </label>
                 <input type="number" name="livro" min="0" value="0" maxlength="3">
            </div>
    </fieldset>
        <div>
            <label> Estoque </label>
            <input type="number" name="estoque" min="0" placeholder="Estoque" value="1" required>
        </div>
        <div>
            <input type="submit" value="Enviar" class="bt confirm">
            <input type="reset" value="Limpar" class="bt alert">
        </div>
</fieldset>   
</form>
<script>
    function validar() {
        var titulo = document.getElementById("titulo").value,
            autor = document.getElementById("autor").value,
            editora = document.getElementById("editora").value;
        return true;
    }
</script>

<?php
//Incluindo o footer
require_once("../../php/footer.php");
?>