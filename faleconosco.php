<html>
    <head>
    <!-- Required meta tags -->
    <title>Index</title>
    <?php include_once "header.php"; ?>
  </head>
  <body>
    <?php 
        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['login'])) {
            if (!isset($_SESSION['login_adm'])) {
                echo "<script> alert ('Voce precisa efetuar o login!')</script>";
                echo "<script> window.location.href = 'index.php'</script>";
            }
        }
    ?>
    <?php include_once 'nav_header.php'; ?>
    <h3 align="center" class="mb-1">Mande-nos sua dúvida, dica ou sugestão...</h3>
    <h5 align="center" class="mb-4">"Observaçao, somente funcionara com gmails"</h5>
        <form action="enviar_mensagem.php" align="center" method="POST">	
            <h4 class="h5">Assunto: 
                    <select name="assunto" class="h6 btn border">
                         <option value="Duvida">Dúvida</option>
                         <option value="Critica">Crítica</option>
                         <option value="Sugestao">Sugestão</option>
                     </select></h4>
            <h4 class="h5 mb-2">Mensagem:</h4>
            <p class="h5 mb-4"><textarea name="mensagem" class="shadow h6 col-12" cols=80 rows=10></textarea></p>
            <input type="submit" class="btn btn-success" value="Enviar">
        </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
    </body>
</html>