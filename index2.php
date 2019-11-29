<!doctype html>
<html lang=pt-br>
  <head>
    <!-- Required meta tags -->
    <title>Index</title>
    <?php include_once "header.php"; ?>
  </head>
  <body>
      <nav id="header" class="navbar navbar-inline navbar-light bg-success">          
          <img src="imagens/iff.jpg" id="logo-index" class="ml-3" alt="Logotipo Hora do IFFar">
          <div class="form-inline">             
              <form class="form-inline">
                    <a class="btn btn-light" href="index.php">Menu Principal</a>           
              </form>
          </div>     
      </nav>
      <?php 
            $genero = $_POST['submit'];
            echo '<div id="conteudo" class="container p-3 mt-5">';
            echo "<h5>Resultados de busca para: <a class='h6'>$genero</a></h5>";  
                include_once "conexao.php";
                $query = "SELECT idpubli, titulo, conteudo, lide, nome_autor, dt, foto, legenda FROM PUBLICACAO WHERE genero = '$genero' ORDER BY idpubli DESC";
                $result = mysqli_query($dbc, $query) or die ('Erro no comando');
                $query_comenta = "SELECT comentario FROM COMENTA";
                $result_comenta = mysqli_query($dbc, $query_comenta) or die ('Erro no comenta');
                while ($row = mysqli_fetch_array($result)) {
                    echo '<form method="POST" action="regis_comen.php">';
                    echo '<div class="container shadow rounded mb-5 p-3 bg-light">';
                    echo '<h2 class="mt-5 h1" align="center">' .$row['titulo']. '</h2>';
                    if (isset($row['lide'])){
                        echo '<i><h6 class="mt-1 mb-4" align="center">' .$row['lide']. '</h6></i>';
                    }
                    echo '<hr class="mb-3">';
                    echo '<div class="px-4 mb-4">' .$row['conteudo']. '</div>';
                    if (isset($row['foto'])) {
                        echo '<p class="px-3 pt-3" align="center"><img style="max-widht: 350px; max-height: 250px;" src="fotos/' .$row['foto'].'" alt="Foto de exibiçao"><br>';'</p>'; 
                        echo '<p class="h6 pb-3" align="center"><i>(' .$row['legenda']. ')</i></p>';
                    }
                    echo '<hr>';
                    echo '<p class="mb-5 ml-3 h6">' .$row['nome_autor']. ' - ' .$row['dt']. '</p>';
                    $query_comenta_adm = "SELECT comentario, idadm FROM COMENTA_ADM WHERE idpublI = '" .$row['idpubli']. "'";
                    $result_comenta_adm = mysqli_query($dbc, $query_comenta_adm) or die ('Erro no comenta');
                    while ($row_comenta_adm = mysqli_fetch_array($result_comenta_adm)){
                        $query_adm = "SELECT nome FROM ADM WHERE idadm = '" .$row_comenta_adm['idadm']. "'";
                        $result_adm = mysqli_query($dbc, $query_adm) or die ('Erro no usu');
                        $row_adm = mysqli_fetch_array($result_adm);
                        echo '<p class="rounded bg-white border mb-1 py-1 pl-1 col-md-6 col-12"><a class="rounded font-weight-bold text-success pr-1 py-1"><img src="imagens/adm.png" class="mr-2" style="widht: 23px; height: 23px;">' .$row_adm['nome']. '</a> ' .$row_comenta_adm['comentario']. '</p>';
                    }
                    $query_comenta = "SELECT comentario, idusu FROM COMENTA WHERE idpublI = '" .$row['idpubli']. "'";
                    $result_comenta = mysqli_query($dbc, $query_comenta) or die ('Erro no comenta');
                    while ($row_comenta = mysqli_fetch_array($result_comenta)){
                        $query_usu = "SELECT nome FROM USUARIO WHERE idusu = '" .$row_comenta['idusu']. "'";
                        $result_usu = mysqli_query($dbc, $query_usu) or die ('Erro no usu');
                        $row_usu = mysqli_fetch_array($result_usu);
                        echo '<p class="col-md-6 col-12 rounded bg-white border mb-1 py-1 pl-1"><a class="rounded font-weight-bold text-success pr-1 py-1"><img src="imagens/usu.png" class="mr-2" style="widht: 23px; height: 23px;">' .$row_usu['nome']. '</a> ' .$row_comenta['comentario']. '</p>';
                    }                    
                    echo '<p><input class="col-md-6 col-8 mt-2 mr-1" type="" name="comentario" placeholder=" Comentario...">';
                    echo '<input type="hidden" name="idpubli" value=' .$row['idpubli'].'>';
                    echo '<input type="submit" value="Enviar"></p>';
                    echo '</div></form>';
                }
                mysqli_close($dbc);
            echo '</div>';            
        ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
  </body>
</html>