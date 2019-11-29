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
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">          
          <div class="container">
              <a class="navbar-brand h1 ml-5 mb-1" href="index.php">Home</a>          
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsite">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form method="post" action="index2.php">      
            <div class="collapse navbar-collapse" id="navbarsite">            
                <ul class="navbar-nav mr-5">
                    <li class="nav-item dropdown mx-4">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Noticias</a>
                        <div class="dropdown-menu col-4 bg-light">                        
                            <input class="dropdown-item" type="submit" name="submit" value="Administracao">
                            <input type="submit" name="submit" class="dropdown-item" value="Agropecuaria">
                            <input type="submit" name="submit" class="dropdown-item" value="IFF geral">
                            <input type="submit" name="submit" class="dropdown-item" value="Informática">
                            <input type="submit" name="submit" class="dropdown-item" value="Veterinaria">
                        </div> 
                    </li>
                    <li class="nav-item dropdown mx-4">                
                        <input type="submit" name="submit" class="nav-link bg-primary border-0" id="navDrop" value="Reportagem">                
                    </li>
                     <li class="nav-item dropdown mx-4">                
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Obras dos Alunos</a>
                        <div class="dropdown-menu col-4 bg-light">                    
                            <input type="submit" name="submit" class="dropdown-item" value="Cronicas">
                            <input type="submit" name="submit" class="dropdown-item" value="Poemas">
                            <input type="submit" name="submit" class="dropdown-item" value="Contos">                
                        </div>  
                    </li>

                    <li class="nav-item dropdown mx-4">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Oficinas</a>
                        <div class="dropdown-menu col-4 bg-light">                    
                            <input type="submit" name="submit" class="dropdown-item" value="Meditaçao">
                            <input type="submit" name="submit" class="dropdown-item" value="Dança">
                            <input type="submit" name="submit" class="dropdown-item" value="Musica">
                            <input type="submit" name="submit" class="dropdown-item" value="Teatro">
                            <input type="submit" name="submit" class="dropdown-item" value="Artes Plasticas">
                        </div> 
                    </li>
                    <li class="nav-item dropdown mx-4">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Projetos</a>
                        <div class="dropdown-menu col-4 bg-light">                    
                            <input type="submit" name="submit" class="dropdown-item" value="Pesquisa">
                            <input type="submit" name="submit" class="dropdown-item" value="Extensao">
                            <input type="submit" name="submit" class="dropdown-item" value="Ensino">
                        </div> 
                    </li>
                    <li class="nav-item dropdown mx-4">                
                        <a class="nav-link mr-4" href="faleconosco.php">Fale Conosco</a>
                    </li>
                </ul>                      
            </div>
        </form>
        </div>
      </nav>
      <div id="conteudo" class="container p-3 mt-5">
            <?php
            include_once "conexao.php";
            $busca = $_GET['consulta'];

            $query = "SELECT IDPUBLI, DT, TITULO, NOME_AUTOR, IDADM, CONTEUDO, LIDE, GENERO, FOTO FROM PUBLICACAO WHERE ((TITULO LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY IDPUBLI DESC";
            $result = mysqli_query($dbc, $query) or die ('Nao ha nada com esse nome');
            while ($row = mysqli_fetch_array($result)) {
                    echo '<form method="POST" action="regis_comen.php">';
                    echo '<div class="container shadow rounded mb-5 p-3 bg-light">';
                    echo '<h2 class="mt-5" align="center">' .$row['TITULO']. '</h2>';
                    echo '<i><h6 class="mt-1 mb-4" align="center">' .$row['LIDE']. '</h6></i>';
                    echo '<div class="border p-3 mb-3">';
                    echo '<p class="mb-1">' .$row['CONTEUDO']. '</p>';
                    if (isset($row['FOTO'])) {
                        echo '<p class="p-3" align="center"><img style="max-widht: 350px; max-height: 250px;" src="fotos/' .$row['FOTO'].'" alt="Foto de exibiçao"><br>';'</p>'; 
                    }
                    echo '</div>';
                    echo '<p class="mb-4 h6">' .$row['NOME_AUTOR']. ' - ' .$row['DT']. '</p>';
                    echo '<hr>';
                    $query_comenta_adm = "SELECT comentario, idadm FROM COMENTA_ADM WHERE idpublI = '" .$row['IDPUBLI']. "'";
                    $result_comenta_adm = mysqli_query($dbc, $query_comenta_adm) or die ('Erro no comenta');
                    while ($row_comenta_adm = mysqli_fetch_array($result_comenta_adm)){
                        $query_adm = "SELECT nome FROM ADM WHERE idadm = '" .$row_comenta_adm['idadm']. "'";
                        $result_adm = mysqli_query($dbc, $query_adm) or die ('Erro no usu');
                        $row_adm = mysqli_fetch_array($result_adm);
                        echo '<p class="rounded bg-white border mb-1 py-1 pl-1 w-50"><a class="rounded font-weight-bold text-success pr-1 py-1"><img src="imagens/adm.png" class="mr-2" style="widht: 23px; height: 23px;">' .$row_adm['nome']. '</a> ' .$row_comenta_adm['comentario']. '</p>';
                    }
                    $query_comenta = "SELECT comentario, idusu FROM COMENTA WHERE idpublI = '" .$row['IDPUBLI']. "'";
                    $result_comenta = mysqli_query($dbc, $query_comenta) or die ('Erro no comenta');
                    while ($row_comenta = mysqli_fetch_array($result_comenta)){
                        $query_usu = "SELECT nome FROM USUARIO WHERE idusu = '" .$row_comenta['idusu']. "'";
                        $result_usu = mysqli_query($dbc, $query_usu) or die ('Erro no usu');
                        $row_usu = mysqli_fetch_array($result_usu);
                        echo '<p class="rounded bg-white border mb-1 py-1 pl-1 w-50"><a class="rounded font-weight-bold text-success pr-1 py-1"><img src="imagens/usu.png" class="mr-2" style="widht: 23px; height: 23px;">' .$row_usu['nome']. '</a> ' .$row_comenta['comentario']. '</p>';
                    }
                    echo '<p><input class="w-50 mt-2 mr-1" type="" name="comentario" placeholder=" Comentario...">';
                    echo '<input type="hidden" name="idpubli" value=' .$row['IDPUBLI'].'>';
                    echo '<input type="submit" value="Enviar"></p>';
                    echo '</div></form>';
                }
                mysqli_close($dbc);
            ?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
  </body>
</html>