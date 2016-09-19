<?php
$titulo = "Excluir Livro"; // Título da pagina

//Incluindo o cabecalho
require_once("../../php/header.php");
?>

<button class="bt-voltar" onclick="window.location.href = 'menu_livro.html'"> Menu </button>
<h2> Excluir determinado livro </h2>
<div class="filtros">
    <h2> Pesquisar por: </h2>
    <button  type="button" onclick="mudaEscolha('titulo')" class="bt-esc bt_filtro"> Título </button>

    <button  type="button" onclick="mudaEscolha('autor')" class="bt-esc bt_filtro"> Autor </button>
</div>
<form method="post" class="form_pesquisar" onsubmit="return validar()" action="../../php/arq_livros/excluir_livro.php">
    <fieldset id="pesq_maior">
        <legend> Pesquisar </legend>
                <label id="pesq"> Informe o nome do livro para o sistema </label>
            <div>
                <input type="text" placeholder="Digite o titulo do livro" name="titulo" size="35" maxlength="15" autofocus id="query">
                <button class="bt_pesquisa confirm"> Pesquisar </button>
            </div>
    <fieldset id="filtros">
        <legend> Filtros </legend>
        <div>
             <label> Gênero Literário </label>
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
            <label> Escola Literaria </label>
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
        <button type="button" onclick="voltarFiltros()" class="bt bt_filtro"> Voltar aos filtros </button>
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

function mudaEscolha(x){
    document.getElementsByClassName("filtros")[0].style.display = "none";
    if(x === 'titulo'){
        document.getElementById("pesq_maior").style.display = "block";

    }else{
        document.getElementById("pesq_maior").style.display = "block";
        document.getElementById("pesq").innerHTML = "Informe o nome do autor para o sistema";
        document.getElementById("filtros").style.display = "none";
        document.getElementById("query").setAttribute("name", "autor");
        document.getElementById("query").setAttribute("placeholder", "Digite o autor que queres pesquisar");
    }
}

function voltarFiltros(){
    document.getElementsByClassName("filtros")[0].style.display = "flex";
    document.getElementById("pesq_maior").style.display = "none";
    document.getElementById("pesq").innerHTML = "Informe o nome do livro para o sistema";
    document.getElementById("filtros").style.display = "block";
    document.getElementById("query").setAttribute("name", "titulo");
    document.getElementById("query").setAttribute("placeholder", "Digite o titulo do livro");
}
</script>
        
<?php
//Incluindo o footer
require_once("../../php/footer.php");
?>