<?php
$titulo = "Adicionar Livro"; // Título da pagina

//Incluindo o cabecalho
require_once("../../php/header.php");
?>
	
<button class="bt-voltar" onclick="window.location.href = 'menu_livro.html'"> Menu </button>

<h2> Adicionar livro ao cadastro </h2>
<form method="post" class="form_adicionar" onsubmit="return validar()" action="../../php/arq_livros/adicionar_livro.php">
    <fieldset>
        <legend> Informações do livro </legend>
        <div>
            <label> Título </label>
            <input type="text" placeholder="Digite o título do livro" name="titulo" maxlength="50" size="30" autofocus id="titulo" required>
        </div>
        <div>
            <label> Autor </label>
            <input type="text" placeholder="Digite o autor do livro" name="autor" maxlength="35" size="30" id="autor" required>
        </div>
        <div>
            <label> Editora </label>
            <input type="text" placeholder="Digite o auto do livro" name="editora" maxlength="35" size="30" id="editora" required>
        </div>
        <fieldset>
            <legend> Literário </legend>
            <div>
                <label> Gênero literário </label>
                <select name="genero" id="genero">
                <option value="a"> Aventura </option>
                <option value="rm"> Romance </option>
                <option value="f"> Ficção </option>
                <option value="tr"> Terror </option>
                <option value="s"> Suspense </option>
                <option value="rp"> Romance Policial </option>
                <option value="p"> Poesia </option>
                <option value="t"> Dramático </option>
                <option value="n" selected> Nenhum </option>
                </select>
            </div>
            <div>
                <label> Escola literária </label>
            <select name="escola" id="escola">
                <option value="c"> Clássico </option>
                <option value="h"> Humanismo (Iluminismo) </option>
                <option value="li"> Literatura de informação </option>
                <option value="t"> Trovadorismo </option>
                <option value="a"> Arcadismo </option>
                <option value="b"> Barroco </option>
                <option value="rm"> Romantismo </option>
                <option value="r"> Realismo </option>
                <option value="s"> Simbolismo </option>
                <option value="pem"> Pré-modernismo </option>
                <option value="m"> Modernismo </option>
                <option value="pom"> Pós-modernismo </option>
                <option value="n" selected> Nenhum </option>
                    </select>
            </div>
            <div>
                <label> Didático </label>
                <select name="didatico">
                <option value="fs"> Filosofia/Sociologia </option>
                <option value="mf"> Matemática/Física </option>
                <option value="pl"> Português/Literatura </option>
                <option value="b"> Biológicas </option>
                <option value="h"> Historia </option>
                <option value="g"> Geografia </option>
                <option value="p"> Pedagógicos </option>
                <option value="e"> Enciclopédias </option>
                <option value="d"> Dicionários </option>
                <option value="n" selected> Nenhum </option>
                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend> Atribuindo um número ao livro </legend>
        <div>
             <label> Código do livro </label>
             <input type="number" name="cod_livro" min="0">
        </div>
        <div>
             <label> Estante </label>
             <input type="number" name="estante" min="0">
        </div>
        <div>
             <label> Prateleira </label>
             <input type="text" name="prateleira" min="0">
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