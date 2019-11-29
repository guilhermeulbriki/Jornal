<?php
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['login']) || isset($_SESSION['login_adm'])) {
$com = $_POST['comentario'];
$id = $_POST['idpubli'];
include_once "conexao.php";
    
    if (isset($_SESSION['login_adm'])) {
        $login_adm_session = $_SESSION['login_adm'];
    $query = "SELECT idadm FROM ADM WHERE nome = '$login_adm_session'";
    $result = mysqli_query($dbc, $query) or die ('Erro no comando');
    $row = mysqli_fetch_array($result);
    $idadm = $row['idadm'];

    $query_insert = "INSERT INTO COMENTA_ADM (idadm, idpubli, comentario) VALUES ('$idadm', '$id', '$com')";
    $result_insert = mysqli_query($dbc, $query_insert) or die ('Erro no insert');
    $var = "<script>javascript:history.back(-2)</script>";
    echo $var;
    }

    if (isset($_SESSION['login'])) {
        $login_session = $_SESSION['login'];
    $query_usu = "SELECT idusu FROM USUARIO WHERE nome = '$login_session'";
    $result_usu = mysqli_query($dbc, $query_usu) or die ('Erro no comando');
    $row_usu = mysqli_fetch_array($result_usu);
    $idusu = $row_usu['idusu'];
    $query_insert = "INSERT INTO COMENTA (idusu, idpubli, comentario) VALUES ('$idusu', '$id', '$com')";
    $result_insert = mysqli_query($dbc, $query_insert) or die ('Erro no insert2');
    $var = "<script>javascript:history.back(-2)</script>";
    echo $var;
    }
    
} else {
    echo '<script> alert("Voce precisa estar logado para efetuar um comentario!")</script>';
    echo '<script> window.location.href = "index.php"</script>';
}
?>