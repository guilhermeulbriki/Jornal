<?php
include_once "conexao.php";
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $autor = $_POST['autor'];
    $imagem = $_FILES['imagem'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('d-m-Y');
    $genero = $_POST['genero_noticia'];
    $lide = $_POST['lide'];
    $legenda = $_POST['legenda'];
    if (!empty($imagem['name'])) {  
        $largura = 500;
        $altura = 400;
        $tamanho = 10000000;
        $error = array();
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])) {
            $error[1] = "Isso não e uma imagem.";
        }
        $dimensoes = getimagesize($imagem['tmp_name']);
        if($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem nao deve ultrapassar" .$largura. " pixels";
        }
        if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
        if($imagem["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
        if(count($error == 0)) {
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
            $nome_imagem = md5(uniqid(time())) . "." .$ext[1];
            $caminho_imagem = "fotos/" .$nome_imagem;
            move_uploaded_file($imagem['tmp_name'], $caminho_imagem);
            if (!isset($_SESSION)) session_start();
            if (isset($_SESSION['login_adm'])) {
                $login_adm_session = $_SESSION['login_adm'];
	           }
            $query_select = "SELECT idadm FROM ADM WHERE nome LIKE '$login_adm_session'";
            $result_select = mysqli_query($dbc, $query_select) or die ('Erro ao executar o comando select');
            $row = mysqli_fetch_array($result_select);
            $idadm = $row['idadm'];
            $query_inserir =  "INSERT INTO PUBLICACAO (dt, titulo, nome_autor, idadm, conteudo, lide, genero, foto, legenda) VALUES ('$data', '$titulo', '$autor', '$idadm', '$conteudo', '$lide', '$genero', '$nome_imagem', '$legenda')";
            $result_inserir = mysqli_query($dbc, $query_inserir) or die ('Erro ao executar o comando inserir');
            if($result_inserir) {
                echo "<script> alert ('Noticia cadastrada com sucesso!')</script>";
                echo "<script> window.location.href = 'index.php'</script>";
            } else {
                echo 'Erro';
            }
        }
        if(count($error) != 0) {
                echo "Erro";
            foreach ($error as $erro) {
                echo $erro. "<br>";
            }
        }
    } else {
        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['login_adm'])) {
          $login_adm_session = $_SESSION['login_adm'];
            }
        $query_select = "SELECT idadm FROM ADM WHERE nome LIKE '$login_adm_session'";
        $result_select = mysqli_query($dbc, $query_select) or die ('Erro ao executar o comando select');
        $row = mysqli_fetch_array($result_select);
        $idadm = $row['idadm'];
        $query_inserir =  "INSERT INTO PUBLICACAO (dt, titulo, nome_autor, idadm, conteudo, lide, genero) VALUES ('$data', '$titulo', '$autor', '$idadm', '$conteudo', '$lide', '$genero')";
        $result_inserir = mysqli_query($dbc, $query_inserir) or die ('Erro ao executar o comando inserir');
        if($result_inserir) {
             echo "<script> alert ('Noticia cadastrada com sucesso!')</script>";
             echo "<script> window.location.href = 'index.php'</script>";
        }
    }
?>