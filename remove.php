<?php
	$id = $_GET['id'];
    include_once "conexao.php";	$query = "DELETE from USUARIO where idusu = '$id' limit 1";
	$result = mysqli_query($dbc, $query) or die ("Erro ao executar o comando");
	mysqli_close($dbc);
    
    header('location: listar_usu.php');
?>