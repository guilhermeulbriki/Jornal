<html>
<head>
    <title>Cadastrar adm - Jornal</title>
    <?php include_once "header.php"; ?>
</head>
<body>
    <form method="POST" action="cadastrar_adm2.php">
        <?php include_once "nav_header.php"; ?>
        <div align='center'>
            <h5 class="mb-2">Ensira a senha usada para cadastrar um administrador:</h5>
            <input type="" name="pass_adm" class="input">
            <input type="submit" class="btn btn-dark" value="Enviar">
        </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>    
</body>
</html>