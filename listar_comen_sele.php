<!DOCTYPE html>
<html>
<head>
	<title>Listar comentarios - Jornal</title>
	<?php include_once "header.php"; ?>
</head>
<body>
    <?php include_once "nav_header.php"; ?>
    <center>
    <?php
        include_once "conexao.php";
        
        $query_adm = "SELECT idadm, nome, email, senha FROM ADM";
        $result_adm = mysqli_query ($dbc, $query_adm) or die ("Erro ao executar o comando");
        echo "<h2 class='mb-1'>Administradores:</h2>";
        echo "<table class='border table table-light'>";
        echo "<thead class='bg-dark text-light'><tr>";
        echo '<td class="h5" scope="col">ID</td>';
        echo '<td class="h5" scope="col">NOME</td>';
        echo '<td class="h5" scope="col">EMAIL</td>';
        echo '<td class="h5" scope="col">SENHA</td>';
        echo '<td class="h5" scope="col">#</td>';
        echo '<tr></thead><tbody>';
        while ($row_adm = mysqli_fetch_array($result_adm)) {            
            echo '<tr><td>' .$row_adm['idadm']. '</td>';
            echo '<td>' .$row_adm['nome']. '</td>';
            echo '<td>' .$row_adm['email']. '</td>';
            echo '<td>' .$row_adm['senha']. '</td>';
            echo '<td id="link"><a href="listar_comen_adm.php?idadm=' .$row_adm['idadm']. '">Selecionar</a></td></tr>';
        }
        echo "</tbody></table>";
        
        $query = "SELECT idusu, nome, email, senha FROM USUARIO";
        $result = mysqli_query ($dbc, $query) or die ("Erro ao executar o comando");
        echo "<h2 class='mt-5 mb-1'>Usuarios:</h2>";
        echo "<table class='border table table-light'>";
        echo "<thead class='bg-success text-light'><tr>";
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
            echo '<td id="link"><a href="listar_comen.php?id=' .$row['idusu']. '">Selecionar</a></td></tr>';
        }
        echo "</tbody></table>";
    ?>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
</body>
</html>