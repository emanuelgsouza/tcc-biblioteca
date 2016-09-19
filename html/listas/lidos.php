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
       
        <h2> Lista de livros mais lidos</h2>
        
		<form method="post" class="form_imprimir" action="../../php/lista/lista-lidos.php" onsubmit="return validar()">
            <fieldset>
                <legend> Pesquisar </legend>
                <label> Exibir os livros maid lidos no período de: </label>
                <select name="periodo">
                    <option value="1"> Dois meses </option>
                    <option value="2"> Tres meses </option>
                    <option value="3"> Seis meses meses </option>
                    <option value="4"> Anual </option>
                </select>
                <button type="submit" class="bt-esc"> Enviar </button>
            </fieldset>
        </form>
	</div>
	</body>
</html>