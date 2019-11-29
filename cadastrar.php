<!DOCTYPE html>
<html>
<head>
	<title>Pagina inicial - Jornal</title>
	<?php include_once "header.php"; ?>
</head>
<body>
	<form method="POST" action="add.php">
        <?php include_once "nav_header.php"; ?>
        <div align='center'>
            <h5>Nome: <input class="mt-5" name="nome"></h5>
            <h5>Email: <input class="mt-2" name="email"></h5>
            <h5>Senha: <input class="mt-2" type="password" name="senha"></h5>
            <h5>Tipo: <select name="cate" id="cate" class="input mb-4">
                    <option value='usu'>Usuario</option>
                    <option value="adm">Administrador</option>
                </select></h5>
            <input class="btn btn-dark mr-3" type="submit" value="Enviar">
        </div>
	</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
</body>
</html>
