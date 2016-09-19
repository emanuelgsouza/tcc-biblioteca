<?php
$titulo = "Adicionar Aluno"; // Título da pagina

// Incluindo o cabecalho
require_once("../../php/header.php");
?>
           
<button class="bt-voltar" onclick="window.location.href = 'menu_aluno.html'"> Menu </button>

<h2> Adicionar aluno ao cadastro </h2>

<form method="post" class="form_adicionar" onsubmit="return validar()" action="../../php/arq_alunos/adicionar_aluno.php">
    <fieldset>
        <legend> Informações pessoais </legend>
        <div>
           <label>Nome: </label>
           <input type="text" name="nome" placeholder="Digite o nome do aluno" maxlength="35" autofocus id="nome" required>
        </div>
        <div>
           <label>Turma:</label>
           <input type="number" name="turma" placeholder="Turma" id="turma" min="1000" required maxlength="4">
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
    var none  = document.getElementById("nome").value.toUpperCase(),
        turma = document.getElementById("turma").value;
    if(!isNaN(nome)) {
        alert("Não é possivel digitar números no nome");
        document.getElementById("nome").focus();
        return false;
    }else{}

    // Caso tenha turmas pré-prontas, pensar em colocar a maior turma(com o maior número) aqui
    if(turma.length === 4) {
        return true;
    }
    else{
        alert("Número da turma inválido. Só possível 3 ou 4 números");
        document.getElementById("turma").focus();
        return false;
    }
}
</script>
<?php
// Incluindo o footer
require_once("../../php/footer.php");
?>   