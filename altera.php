<!DOCTYPE html>
<html>
<head>
	<title>Alterar dados - Jornal</title>
	<?php include_once "header.php"; ?>
</head>
<body>
    <?php include_once "nav_header.php"; ?>
	<form action="validar_altera.php" method="POST" align="center">
        <h3 class="mb-5">Por favor, preencha o campo do dado que deseja alterar:</h3>
		<h4>Nome: <input class="input mb-2 h5" type="" name="nome"></h4>
		<h4>Email: <input class="input mb-2 h5" type="" name="email"></h4>
		<h4>Senha: <input class="input mb-2 h5" type="password" name="senha"></h4>
        <h4>Senha Atual: <input class="input mb-2 h5" type="password" name="atual"></h4>
		<input type="submit" class="btn btn-dark mt-4" value="ENVIAR">
	</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
</body>
</html>