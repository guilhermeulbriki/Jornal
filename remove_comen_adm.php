<?php
	$id = $_GET['idadm'];
	include_once "conexao.php";
	$query = "DELETE FROM COMENTA_ADM WHERE idco = '$id' limit 1";
	$result = mysqli_query($dbc, $query) or die ("Erro ao executar o comando");
	mysqli_close($dbc);
    
    header('location: listar_comen_sele.php');
?>