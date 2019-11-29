<!DOCTYPE html>
<html>
<head>
	<title>Login - Jornal</title>
	<?php include_once "header.php"; ?>
</head>
<body>
	<?php include_once "nav_header.php"; ?>
	<div align='center' id="login">
		<form method="post" action="login_usu.php">
			<h5>Nome: <input type="text" class="input mt-5 mb-3" name="nome"></h5>
			<h5>Senha: <input type="password" class="input mb-4" name="senha"></h5>
			<input type="submit" name="entrar" id="entrar" class="btn btn-dark" value="LOGAR">
		</form>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
</body>
</html>