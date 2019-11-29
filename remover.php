<?php
include_once 'conexao.php';

if(!isset($_SESSION)) session_start();

if (isset($_SESSION['login'])) {
    $login_session = $_SESSION['login'];
    $query_select = "SELECT idusu FROM USUARIO WHERE nome = '$login_session'";
    $result_select = mysqli_query($dbc, $query_select) or die ('Erro select usu');
    $row = mysqli_fetch_array($result_select);
    
    $query_delete = "DELETE FROM COMENTA WHERE idusu = '" .$row['idusu']. "'";
    $result = mysqli_query($dbc, $query_delete) or die ('Erro delete comenta usu');
    
    $query = "DELETE FROM USUARIO WHERE idusu = '" .$row['idusu']. "'";
    $result = mysqli_query($dbc, $query) or die ('Erro delete usu');
    echo "<script> alert ('Usuario deletado com sucesso')</script>";
    echo "<script> window.location.href = 'index.php'</script>";
    unset ($_SESSION['login']);
}
?>