<!doctype html>
<html lang=pt-br>
  <head>
    <!-- Required meta tags -->
    <title>Index</title>
      <?php include_once "header.php"; ?>
      <meta http-equiv="refresh" content="60;url=index.php">
  </head>
  <body>
      <nav id="header" class="navbar navbar-inline navbar-light bg-success">          
          <img src="imagens/iff.jpg" id="logo-index" class="ml-3" alt="Logotipo Hora do IFFar">
          <div class="pb-3 mr-4">
            <button id="but_nav1" class="navbar-toggler bg-white mt-3" type="button" data-toggle="collapse" data-target="#busca">
                <span class="navbar-toggler-icon"></span>
            </button>
          </div>      
            <nav class="navbar navbar-expand-lg">    
                  <div id="busca" class="form-inline collapse navbar-collapse">  
                  <form class="form-inline" method="get" action="busca.php">
                      <div class="mr-5">
                        <?php
                            if (!isset($_SESSION)) session_start();
                            if (isset($_SESSION['login'])) {
                                $login_session = $_SESSION['login'];
                               }
                            if (isset($_SESSION['login_adm'])) {
                                $login_adm_session = $_SESSION['login_adm'];
                               }                        
                            if (isset($login_session)){
                                echo "<a href='opcoes_usu.php'><img id='icone_usu' class='h5 mt-2' style='widht: 40px; height: 40px;' src='imagens/usu.png'></a>";
                            } else {
                                if (isset($login_adm_session)) {
                                    echo "<a href='opcoes_adm.php'><img id='icone_usu' class='h5 mt-2' style='widht: 45px; height: 45px;' src='imagens/adm.png'></a>";
                                } else {
                                    echo '<a class="btn btn-secondary mr-2" href="cadastrar.php">Cadastro</a>
                                    <a class="btn btn-secondary" href="logar.php">Login</a>';
                                }
                            }
                        ?>
                       </div>
                      <input class="form-control mr-2 col-4"  id="consulta" name="consulta" type="text" placeholder="Buscar...">
                      <button class="btn btn-light mr-3" type="submit">Ok</button>       
                  </form>
                </div>
            </nav>     
      </nav>
      <nav class="navbar navbar-expand-lg mb-3 navbar-dark bg-primary">          
          <div class="container">
              <a class="navbar-brand h1 mb-1 ml-5" href="#">Home</a>          
                <button id="but_nav" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsite">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <form method="post" action="index2.php">      
                    <div class="collapse navbar-collapse" id="navbarsite">            
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown mr-4">
                                <a class="nav-link dropdown-toggle ml-4" href="#" data-toggle="dropdown" id="navDrop">Noticias</a>
                                <div class="dropdown-menu col-4 bg-light">                        
                                    <input class="dropdown-item" type="submit" name="submit" value="Administracao">
                                    <input type="submit" name="submit" class="dropdown-item" value="Agropecuaria">
                                    <input type="submit" name="submit" class="dropdown-item" value="IFFgeral">
                                    <input type="submit" name="submit" class="dropdown-item" value="Informatica">
                                    <input type="submit" name="submit" class="dropdown-item" value="Veterinaria">
                                </div> 
                            </li>
                            <li class="nav-item dropdown mx-4">                
                                <input type="submit" name="submit" class="nav-link bg-primary border-0" id="navDrop" value="Reportagem">                
                            </li>
                             <li class="nav-item dropdown mx-4">                
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Obras dos Alunos</a>
                                <div class="dropdown-menu col-4 bg-light">                    
                                    <input type="submit" name="submit" class="dropdown-item" value="Cronica">
                                    <input type="submit" name="submit" class="dropdown-item" value="Poema">
                                    <input type="submit" name="submit" class="dropdown-item" value="Conto">                
                                </div>  
                            </li>

                            <li class="nav-item dropdown mx-4">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Oficinas</a>
                                <div class="dropdown-menu col-4 bg-light">                    
                                    <input type="submit" name="submit" class="dropdown-item" value="Meditacao">
                                    <input type="submit" name="submit" class="dropdown-item" value="Danca">
                                    <input type="submit" name="submit" class="dropdown-item" value="Musica">
                                    <input type="submit" name="submit" class="dropdown-item" value="Teatro">
                                    <input type="submit" name="submit" class="dropdown-item" value="ArtesPlasticas">
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
                            <li class='nav-item dropdown mx-4'>
                                <a class="nav-link mr-5" href="faleconosco.php">Fale Conosco</a>
                            </li>
                        </ul>                      
                    </div>
                </form>
        </div>
      </nav>
      <div id="conteudo" class="container mt-3 p-3">          
            <?php
                include_once "conexao.php";
                $query = "SELECT idpubli, titulo, conteudo, lide, nome_autor, dt, foto, legenda FROM PUBLICACAO ORDER BY idpubli DESC";
                $result = mysqli_query($dbc, $query) or die ('Erro no comando');
                $query_comenta = "SELECT comentario FROM COMENTA";
                $result_comenta = mysqli_query($dbc, $query_comenta) or die ('Erro no comenta');
                while ($row = mysqli_fetch_array($result)) {
                    echo '<form method="POST" action="regis_comen.php">';
                    echo '<div class="container shadow rounded mb-5 p-3 bg-light">';
                    echo '<h2 class="mt-5 h1" align="center">' .$row['titulo']. '</h2>';
                    echo '<i><h6 class="mt-1 mb-4" align="center">"' .$row['lide']. '"</h6></i>';
                    echo '<hr class="mb-3">';
                    echo '<div class="px-4 mb-4">' .$row['conteudo']. '</div>';
                    if (isset($row['foto'])) {
                        echo '<p class="px-3 pt-3" align="center"><img style="max-widht: 350px; max-height: 250px;" src="fotos/' .$row['foto'].'" alt="Foto de exibiçao"><br>';'</p>'; 
                    }
                    echo '<p class="h6 pb-3" align="center"><i>(' .$row['legenda']. ')</i></p>';
                    echo '<hr>';
                    echo '<p class="mb-5 ml-3 h6">' .$row['nome_autor']. ' - ' .$row['dt']. '</p>';
                    $query_comenta_adm = "SELECT comentario, idadm FROM COMENTA_ADM WHERE idpublI = '" .$row['idpubli']. "'";
                    $result_comenta_adm = mysqli_query($dbc, $query_comenta_adm) or die ('Erro no comenta');
                    while ($row_comenta_adm = mysqli_fetch_array($result_comenta_adm)){
                        $query_adm = "SELECT nome FROM ADM WHERE idadm = '" .$row_comenta_adm['idadm']. "'";
                        $result_adm = mysqli_query($dbc, $query_adm) or die ('Erro no usu');
                        $row_adm = mysqli_fetch_array($result_adm);
                        echo '<p class="rounded bg-white border mb-1 py-1 pl-1 w-50"><a class="rounded font-weight-bold text-success pr-1 py-1"><img src="imagens/adm.png" class="mr-2" style="widht: 23px; height: 23px;">' .$row_adm['nome']. '</a> ' .$row_comenta_adm['comentario']. '</p>';
                    }
                    $query_comenta = "SELECT comentario, idusu FROM COMENTA WHERE idpublI = '" .$row['idpubli']. "'";
                    $result_comenta = mysqli_query($dbc, $query_comenta) or die ('Erro no comenta');
                    while ($row_comenta = mysqli_fetch_array($result_comenta)){
                        $query_usu = "SELECT nome FROM USUARIO WHERE idusu = '" .$row_comenta['idusu']. "'";
                        $result_usu = mysqli_query($dbc, $query_usu) or die ('Erro no usu');
                        $row_usu = mysqli_fetch_array($result_usu);
                        echo '<p class="rounded bg-white border mb-1 py-1 pl-1 w-50"><a class="rounded font-weight-bold text-success pr-1 py-1"><img src="imagens/usu.png" class="mr-2" style="widht: 23px; height: 23px;">' .$row_usu['nome']. '</a> ' .$row_comenta['comentario']. '</p>';
                    }                    
                    echo '<p><input class="w-50 mt-2 mr-1" type="" name="comentario" placeholder=" Comentario...">';
                    echo '<input type="hidden" name="idpubli" value=' .$row['idpubli'].'>';
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