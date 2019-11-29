<!DOCTYPE html>
<html>
<head>
	<title>Listar usuários - Jornal</title>
	<?php include_once "header.php"; ?>
</head>
<body>
    <?php include_once "nav_header.php"; ?>
    <center>
    <?php
        include_once "conexao.php";
        $query = "SELECT idusu, nome, email, senha FROM USUARIO";
        $result = mysqli_query ($dbc, $query) or die ("Erro ao executar o comando");
        echo '<div class="container shadow p-1 bg-light">';
        echo "<table class='border table table-light'>";
        echo "<thead class='bg-primary text-light'><tr>";
        echo '<td class="h5" scope="col">ID</td>';
        echo '<td class="h5" scope="col">NOME</td>';
        echo '<td class="h5" scope="col">EMAIL</td>';
        echo '<td class="h5" scope="col">SENHA</td>';
        echo '<td class="h5" scope="col">#</td>';
        echo '<tr></thead><tbody>';
        while ($row = mysqli_fetch_array($result)) {            
            echo '<tr><td>' .$row['idusu']. '</td>';
            echo '<td>' .$row['nome']. '</td>';
            echo '<td>' .$row['email']. '</td>';
            echo '<td>' .$row['senha']. '</td>';
            echo '<td id="link"><a href="remove.php?id=' .$row['idusu']. '">Remover</a></td></tr>';
        }
        echo "</tbody></table>";
        echo '</div>';
    ?>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
</body>
</html>