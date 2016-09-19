<?php
$titulo = "Excluir Arquivo Morto"; // Título da pagina

//Incluindo o cabecalho
require_once("../../php/header.php");
?>
<button class="bt-voltar" onclick="window.location.href = 'menu_arquivo_morto.html'"> Menu </button>
<h2> Excluir determinado livro </h2>
<div class="filtros">
    <h2> Pesquisar por: </h2>
    <button  type="button" onclick="mudaEscolha('titulo')" class="bt-esc bt_filtro"> Título </button>

    <button  type="button" onclick="mudaEscolha('autor')" class="bt-esc bt_filtro"> Autor </button>
</div>
<form method="post" class="form_pesquisar" onsubmit="return validar()" action="../../php/arq_morto/excluir_livro.php">        
    <fieldset id="pesq_maior">
        <legend> Pesquisar </legend>
            <label id="pesq"> Informe o nome do livro para o sistema </label>
        <div>
             <input type="text" placeholder="Digite o titulo do livro" name="titulo" size="35" maxlength="15" autofocus id="query">
             <button class="bt_pesquisa confirm"> Pesquisar </button>
        </div>
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
            document.getElementById("query").setAttribute("name", "autor");
            document.getElementById("query").setAttribute("placeholder", "Digite o nome do autor para o sistema");
        }
    }
</script>
<?php
//Incluindo o footer
require_once("../../php/footer.php");
?>