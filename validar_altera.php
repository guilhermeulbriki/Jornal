<?php
include_once 'conexao.php';

if(!isset($_SESSION)) session_start();
if (isset($_SESSION['login'])){

    $senha_atual = $_POST['atual'];

    $login_session = $_SESSION['login'];
    $query = "SELECT * FROM USUARIO WHERE nome LIKE '$login_session' and senha LIKE '$senha_atual'";
    $result = mysqli_query($dbc, $query) or die ('Erro no comando');
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) <= 0) {
        echo "<script> alert ('Usuario nao encontrado')</script>";
        echo "<script> window.location.href = 'opcoes_usu.php'</script>";
    } else {        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $id = $row['IDUSU'];
        
        if($nome != '') $_SESSION['nome_altera'] = $nome;
        if($email != '') $_SESSION['email_altera'] = $email;
        if($senha != '') $_SESSION['senha_altera'] = $senha;
        $_SESSION['id_altera'] = $id;
        
        header ("location: alterar.php");
    }
} else {
    if (isset($_SESSION['login_adm'])){

        $senha_atual = $_POST['atual'];

        $login_adm_session = $_SESSION['login_adm'];
        $query = "SELECT * FROM ADM WHERE nome LIKE '$login_adm_session' and senha LIKE '$senha_atual'";
        $result = mysqli_query($dbc, $query) or die ('Erro no comando');
        $row = mysqli_fetch_array($result);

        if(mysqli_num_rows($result) <= 0) { 
            echo "<script> alert ('Administrador nao encontrado')</script>";
            echo "<script> window.location.href = 'opcoes_adm.php'</script>";
        } else {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $id = $row['IDADM'];

            if($nome != '') $_SESSION['nome_altera'] = $nome;
            if($email != '') $_SESSION['email_altera'] = $email;
            if($senha != '') $_SESSION['senha_altera'] = $senha;
            $_SESSION['id_altera'] = $id;
        
            header ("location: alterar.php"); 
        }
    }
}
?>