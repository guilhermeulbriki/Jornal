<!DOCTYPE html>
<html>
<head>
	<title>Listar comentarios - Jornal</title>
	<?php include_once "header.php"; ?>
</head>
<body>
    <?php include_once "nav_header.php"; ?>
    <?php
        include_once "conexao.php";
        $id = $_GET['id'];
        $query = "SELECT comentario, idco, idusu FROM COMENTA WHERE idusu = '$id'";
        $result = mysqli_query($dbc, $query) or die ('Erro no codigo');
        echo "<table class='border table table-light'>";
        echo "<thead class='bg-dark text-light'><tr>";
        echo '<td class="h5" scope="col">COMENTARIO</td>';
        echo '<td class="h5" scope="col">#</td>';
        while ($row = mysqli_fetch_array($result)) {            
            echo '<tr><td class="bg-light text-dark">' .$row['comentario']. '</td>';
            echo '<td class="bg-light"><a href="remove_comen.php?id=' .$row['idco']. '">Excluir</a></td></tr>';
        }
        echo "</tbody></table>";
    ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
</body>
</html>