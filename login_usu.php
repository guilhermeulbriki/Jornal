<?php
    $nome = $_POST['nome'];
    $entrar = $_POST['entrar'];
    $senha = $_POST['senha'];

   include_once "conexao.php";

    if (strlen($nome) > 0 && strlen($senha) > 0){ 
        if (isset($entrar)) {
            $query = "SELECT * FROM USUARIO WHERE nome = '$nome' AND senha = '$senha'";
            $result = mysqli_query($dbc, $query) or die ('Erro ao executar o comando');
                if (mysqli_num_rows($result)<=0) {
                    echo "<script> alert ('Login e/ou senha incorretos')</script>";
                    echo "<script> window.location.href = 'index.php'</script>";
                } else {
                    $resultado = mysqli_fetch_assoc($result);
                    if (!isset($_SESSION)) session_start();
                    $_SESSION['login'] = $resultado['NOME'];
                    $_SESSION['id'] = $resultado['IDUSU'];
                    echo "<script> alert ('Seja Bem Vindo $nome')</script>";
                    echo "<script> window.location.href = 'index.php'</script>";
                }
        }        
    }
?>