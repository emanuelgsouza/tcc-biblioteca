<?php
$titulo = "Listar Aluno"; // Título da pagina

// Incluindo o cabecalho
require_once("../../php/header.php");
?>

<button class="bt-voltar" onclick="window.location.href = 'menu_aluno.html'"> Menu </button>
    <h2> Gerar lista de: </h2>
    <div class="filtros">
        <button type="button" class="bt-esc bt_filtro" onclick="muda(1)"> Lista de Alunos por Turma </button>
        <button type="button" class="bt-esc bt_filtro" onclick="muda(2)"> Lista de Inadimplentes </button>
        <button type="button" class="bt-esc bt_filtro" onclick="muda(3)"> Lista de Leitores </button>
    </div>
    <form method="post" class="form_imprimir">
        <fieldset id="lista-alunos">
            <legend> Pesquisar </legend>
                <label> Informe o número de uma turma para o sistema e ele irá gerar uma lista de alunos</label>
            <div>
                <input type="number" placeholder="Faça a sua busca" name="turma" size="35" maxlength="15" min="1000" pattern="/\d\d\d\d/">
                
                <input type="submit" class="bt_pesquisa confirm" value="Pesquisar" formaction="../../php/arq_alunos/gerar_lista_turma.php">
            </div>
        </fieldset>
        
        <fieldset id="inadimplentes">
            <legend> Lista de Alunos inadimplentes </legend>
            <label for="data"> Alunos inadimplentes à </label>
            <div>
                <select name="diasAluno">
                    <option value="1"> Mais do que trinta dias </option>
                    <option value="2"> Menos do que trinta dias</option>
                </select>
                <input type="submit" value="Pesquisar" class="bt_pesquisa confirm" formaction="../../php/lista/lista-inadimplentes.php">
            </div>
        </fieldset>
        
        <fieldset id="leitores">
            <legend> Lista de Leitores do mês </legend>
                <label for="data"> Exibir os leitores no período de </label>
                <div>
                    <select name="diasAluno">
                        <option value="1"> Um mês </option>
                        <option value="2"> Dois meses</option>
                    </select>
                    <input type="submit" class="bt_pesquisa confirm" value="Pesquisar" formaction="../../php/lista/lista-leitores.php">
                </div>
            </fieldset>
        </fieldset>
        <button type="button" class="bt-esc confirm" onclick="voltaFiltro()"> Voltar aos filtros </button>
    </form>
<script>
    document.getElementsByClassName("form_imprimir")[0].style.display = "none";
    
    function muda(x) {
        document.getElementsByClassName("filtros")[0].style.display = "none";
        document.getElementsByClassName("form_imprimir")[0].style.display = "block";
        if(x == 1) {
            document.getElementById("lista-alunos").style.display = "flex";
            document.getElementById("inadimplentes").style.display = "none";
            document.getElementById("leitores").style.display = "none";
        }
        else if(x == 2) {
            document.getElementById("inadimplentes").style.display = "flex";
            document.getElementById("lista-alunos").style.display = "none";
            document.getElementById("leitores").style.display = "none";
        }
        else {
            document.getElementById("leitores").style.display = "flex";
            document.getElementById("inadimplentes").style.display = "none";
            document.getElementById("lista-alunos").style.display = "none";
        }
    }
    
    function voltaFiltro() {
        document.getElementsByClassName("form_imprimir")[0].style.display = "none";
        document.getElementsByClassName("filtros")[0].style.display = "flex";
    }
</script>
<?php
// Incluindo o footer
require_once("../../php/footer.php");
?>