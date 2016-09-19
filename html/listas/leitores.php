<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../css/style_form.css">
		<title> Formulário pessoas inadimplentes </title>
	</head>
	<body>
	<div class="interface">
		<button class="bt-voltar" onclick="window.location.href = 'menu-listas.html'"> Menu </button>
       
        <h2> Gerar lista de: </h2>
        
        <div class="filtros">
            <button type="button" class="bt-esc" onclick="muda(1)"> Alunos </button>
            <button type="button" class="bt-esc" onclick="muda()"> Pessoas </button>
        </div>
        
		<form method="post" class="form_imprimir" action="../../php/lista/lista-leitores.php" onsubmit="return validar()">
            <fieldset>
                <legend> Pesquisar </legend>
                <label for="data"> Exibir os leitores no período de </label>
                <select name="diasAluno">
                    <option value="1"> Um mês </option>
                    <option value="2"> Dois meses</option>
                </select>
                <button type="submit" class="bt-esc"> Enviar </button>
            </fieldset>
            <button type="button" class="bt-esc" onclick="voltaFiltro()"> Volta aos filtros </button>
        </form>
	</div>
	<script>
        document.getElementsByClassName("form_imprimir")[0].style.display = "none";
        function muda(x){
            document.getElementsByClassName("form_imprimir")[0].style.display = "block";
            document.getElementsByClassName("filtros")[0].style.display = "none";
            if(x != 1){
                document.getElementsByTagName("select")[0].setAttribute("name", "diasPessoa");
            }
        }
        
        function voltaFiltro(){
            document.getElementsByClassName("form_imprimir")[0].style.display = "none";
            document.getElementsByClassName("filtros")[0].style.display = "flex";
        }
    </script>
	</body>
</html>