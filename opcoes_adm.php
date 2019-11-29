<html>
    <head>
        <title>ADM - Jornal</title>
	    <?php include_once "header.php"; ?>
    </head>
    <body>
        <?php include_once "nav_header.php"; ?>
        <div class="container bg-light p-4 shadow" align="center">
            <a class="btn btn-dark text-light mb-3" href="altera.php">Alterar dados da conta</a><br>
            <a class="btn btn-dark text-light mb-3" href="cadas_noti.php">Cadastrar Notícias</a><br>
            <a class="btn btn-dark text-light mb-3" href="listar_usu.php">Listar Usuários</a><br>
            <a class="btn btn-dark text-light mb-3" href="listar_comen_sele.php">Listar Comentários</a><br>
            <a class="btn btn-dark text-light" href="logout.php">Logout</a><br>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/popper.js/dist/popper.js"></script>
        <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
    </body>
</html>