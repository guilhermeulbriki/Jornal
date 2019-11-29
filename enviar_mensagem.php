<html>
<head>
	<title>Mensagem</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
        include_once "conexao.php";
        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['login'])){
            $login_session = $_SESSION['login'];
            $query = "SELECT nome, email FROM USUARIO WHERE nome = '$login_session'";
            $result = mysqli_query($dbc, $query) or die ('Erro no codigo usu');
            $row = mysqli_fetch_array($result);
		    $assunto = $_POST["assunto"];
		    $mensagem = $_POST["mensagem"];		
            $row['nome'] = $row['nome']."<".$row['email'].">";		
		    include_once("funcoes.php");		
		    echo enviarEmail('horadoiffar@gmail.com', $row['nome'], $assunto, $mensagem);
        } else {
            if (isset($_SESSION['login_adm'])) {
                $login_adm_session = $_SESSION['login_adm'];
                $login_session = $_SESSION['login'];
                $query = "SELECT nome, email FROM ADM WHERE nome = '$login_adm_session'";
                $result = mysqli_query($dbc, $query) or die ('Erro no codigo usu');
                $row = mysqli_fetch_array($result);
                $assunto = $_POST["assunto"];
                $mensagem = $_POST["mensagem"];		
                $row['nome'] = $row['nome']."<".$row['email'].">";		
                include_once("funcoes.php");		
                echo enviarEmail('horadoiffar@gmail.com', $row['nome'], $assunto, $mensagem);
            } else {
                echo "<script> alert ('Voce precisa efetuar o login!')</script>";
                echo "<script> window.location.href = 'index.php'</script>";
            }
        }
	?>	
</body>
</html>