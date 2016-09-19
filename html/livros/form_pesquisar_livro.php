<?php
$titulo = "Pesquisar Livro"; // Título da pagina

//Incluindo o cabecalho
require_once("../../php/header.php");
?>
<button class="bt-voltar" onclick="window.location.href = 'menu_livro.html'"> Menu </button>

<div class="filtros">
    <h2> Quer pesquisar por? </h2>
    <button class="bt-esc bt_filtro" onclick="mudaEscolha(1)"> Gênero Literário </button>
    <button class="bt-esc bt_filtro" onclick="mudaEscolha(2)"> Escola Literária </button>
    <button class="bt-esc bt_filtro" onclick="mudaEscolha(3)"> Autor </button>
    <button class="bt-esc bt_filtro" onclick="mudaEscolha(4)"> Livro Didático </button>
    <button class="bt-esc bt_filtro" onclick="mudaEscolha(5)"> Livro em especial </button>
    <button class="bt-esc bt_filtro" onclick="mudaEscolha(6)"> Lista mais lidos </button>
</div>

<form method="post" class="form_imprimir" onsubmit="return validar()" action="../../php/arq_livros/pesquisa_livro.php">
    <h2> Pesquise por </h2>
        <!-- Caso seja um livro que ele esteja procurando -->
        <fieldset id="livro">
            <legend> Pesquisar </legend>
                <label> Informe o nome do livro para o sistema </label>
                <div>
                    <input type="text" placeholder="Digite o titulo do livro" name="titulo" size="35" maxlength="15">
                    <button type="submit" class="bt_pesquisa confirm"> Pesquisar </button>
                </div>
        </fieldset>

        <!-- Caso queira gerar uma lista a partir do genero -->
        <fieldset id="genero">
        <legend> Genero </legend>
            <label> Informe o genero do qual queres a lista: </label>
            <div>
                <select name="genero">
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
                <button type="submit" class="bt_pesquisa confirm"> Gerar Lista </button>
            </div>
        </fieldset>

        <!-- Caso queira gerar uma lista a partir da escola -->
        <fieldset id="escola">
        <legend> Escola </legend>
            <label> Informe a escola literária do qual queres a lista: </label>
            <div>
                <select name="escola">
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
                <button type="submit" class="bt_pesquisa confirm"> Gerar Lista </button>
            </div>
    </fieldset>

        <!-- Caso queira gerar uma lista a partir do tipo didático -->
        <fieldset id="didatico">
        <legend> Didático </legend>
            <label> Informe a categoria didática do qual queres a lista: </label>
            <div>
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
                <button type="submit" class="bt_pesquisa confirm"> Gerar Lista </button>
            </div>
        </fieldset>

        <!-- Caso queira gerar uma lista a partir de um autor(ra) -->
        <fieldset id="autor">
            <legend> Pesquisar por autor </legend>
                <label> Informe o nome do autor para o sitema </label>
                <div>
                    <input type="text" maxlength="35" size="35" name="autor" placeholder="Digite um nome de autor">
                    <button type="submit" class="bt_pesquisa confirm"> Pesquisar </button>
                </div>
        </fieldset>
        
        <!-- Caso queira saber os livros mais lidos -->
        <fieldset id="lidos">
            <legend> Lista dos livros mais lidos </legend>
                <label> Exibir os livros mais lidos no período de: </label>
                <div>
                    <select name="periodo">
                        <option value="1"> Dois meses </option>
                        <option value="2"> Tres meses </option>
                        <option value="3"> Seis meses meses </option>
                        <option value="4"> Anual </option>
                    </select>
                    <input type="submit" class="bt_pesquisa confirm" value="Gerar Lista" formaction="../../php/lista/lista-lidos.php">
                </div>
        </fieldset>

        <!-- Caso queira voltar aos filtros -->
        <button class="bt bt_filtro confirm" type="button" onclick="voltarFiltros()"> Voltar aos filtros </button>
</form>
<script>
    document.getElementsByClassName("form_imprimir")[0].style.display = "none"; // Sumindo com o formulário
    function mudaEscolha(x){
        document.getElementsByClassName("form_imprimir")[0].style.display = "block";
        document.getElementsByClassName("filtros")[0].style.display = "none";
        if(x === 1){
            document.getElementById("genero").style.display = "block";
        }else if(x === 2){
            document.getElementById("escola").style.display = "block";
        }else if(x === 3){
            document.getElementById("autor").style.display = "block";
        }else if(x === 4){
            document.getElementById("didatico").style.display = "block";
        }else if(x == 5) {
            document.getElementById("livro").style.display = "block";
        }else {
            document.getElementById("lidos").style.display = "block";
        }
    }

    function voltarFiltros(){
        document.getElementsByClassName("form_imprimir")[0].style.display = "none"; // Sumindo com o form novamente
        document.getElementsByClassName("filtros")[0].style.display = "flex";
        document.getElementById("genero").style.display = "none";
        document.getElementById("escola").style.display = "none";
        document.getElementById("autor").style.display = "none";
        document.getElementById("didatico").style.display = "none";
        document.getElementById("livro").style.display = "none";
        document.getElementById("lidos").style.display = "none";
    }
</script>

<?php
//Incluindo o footer
require_once("../../php/footer.php");
?>