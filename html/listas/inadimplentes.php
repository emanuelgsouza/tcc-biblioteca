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
            
		<form method="post" class="form_imprimir" action="../../php/lista/lista-inadimplentes.php" onsubmit="return validar()">
            <fieldset>
                <legend> Filtrar pesquisa </legend>
                <label for="data"> Alunos inadimplentes à </label>
                <select name="diasAluno">
                    <option value="1"> Mais do que trinta dias </option>
                    <option value="2"> Menos do que trinta dias</option>
                </select>
                <button type="submit" class="bt"> Enviar </button>
            </fieldset>
            <button type="button" class="bt" onclick="volta()"> Voltar as categorias </button>
        </form>
	</div>
	<script>
        document.getElementsByClassName("form_imprimir")[0].style.display = "none";
        function muda(x){
            document.getElementsByClassName("form_imprimir")[0].style.display = "block";
            document.getElementsByClassName("filtros")[0].style.display = "none";
            if(x != 1){
                document.getElementsByTagName("select")[0].setAttribute("name", "diasPessoa");
                document.getElementsByTagName("label")[0].innerHTML = "Pessoas inadimplentes à:";
            }
        }
        
        function volta(){
            document.getElementsByClassName("form_imprimir")[0].style.display = "none";
            document.getElementsByClassName("filtros")[0].style.display = "flex";
        }
    </script>
	</body>
</html>