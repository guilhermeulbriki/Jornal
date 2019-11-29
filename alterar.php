USUARIO<?php
include_once 'conexao.php';

if(!isset($_SESSION)) session_start();

if (isset($_SESSION['login'])) {    
    $id = $_SESSION['id_altera'];
    
    if(isset($_SESSION['nome_altera'])){
        $nome = $_SESSION['nome_altera'];
        $query_nome = "UPDATE USUARIO SET nome = '$nome' WHERE idusu = '$id'";
        $result_nome = mysqli_query($dbc, $query_nome) or die ('Erro no comando nome usu');
        unset ($_SESSION['login']);
        unset ($_SESSION['nome_altera']);
    }
    if(isset($_SESSION['email_altera'])){
        $email = $_SESSION['email_altera'];
        $query_email = "UPDATE USUARIO SET email = '$email' WHERE idusu = '$id'";
        $result_email = mysqli_query($dbc, $query_email) or die ('Erro no comando email usu');
        unset ($_SESSION['email_altera']);
    }
    if(isset($_SESSION['senha_altera'])){
        $senha = $_SESSION['senha_altera'];
        $query_senha = "UPDATE USUARIO SET senha = '$senha' WHERE idusu = '$id'";
        $result_senha = mysqli_query($dbc, $query_senha) or die ('Erro no comando senha usu');
        unset ($_SESSION['senha_altera']);
    }
    
    echo "<script> alert ('Campos alterados com sucesso')</script>";
    echo "<script> window.location.href = 'index.php'</script>";
    
} else {
    if (isset($_SESSION['login_adm'])) {    
    $id = $_SESSION['id_altera'];
    
    if(isset($_SESSION['nome_altera'])){
        $nome = $_SESSION['nome_altera'];
        $query_nome = "UPDATE ADM SET nome = '$nome' WHERE idadm = '$id'";
        $result_nome = mysqli_query($dbc, $query_nome) or die ('Erro no comando nome adm');
        unset ($_SESSION['login_adm']);
        unset ($_SESSION['nome_altera']);
    }
    if(isset($_SESSION['email_altera'])){
        $email = $_SESSION['email_altera'];
        $query_email = "UPDATE ADM SET email = '$email' WHERE idadm = '$id'";
        $result_email = mysqli_query($dbc, $query_email) or die ('Erro no comando email adm');
        unset ($_SESSION['email_altera']);
    }
    if(isset($_SESSION['senha_altera'])){
        $senha = $_SESSION['senha_altera'];
        $query_senha = "UPDATE ADM SET senha = '$senha' WHERE idadm = '$id'";
        $result_senha = mysqli_query($dbc, $query_senha) or die ('Erro no comando senha adm');
        unset ($_SESSION['senha_altera']);
    }
    
    echo "<script> alert ('Campos alterados com sucesso')</script>";
    echo "<script> window.location.href = 'index.php'</script>";
    }
}
?>