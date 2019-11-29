<!doctype html>
<html lang=pt-br>
    <head>
        <!-- Required meta tags -->
        <title>Cadastrar Noticias - Jornal</title>
        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
        <script type="text/javascript" src="nicEdit-latest.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            bkLib.onDomLoaded(function() {
                new nicEditor({maxHeight : 200}).panelInstance('area');
                new nicEditor({fullPanel : true,maxHeight : 200}).panelInstance('area1');
            });
            //]]>
        </script>
        <?php include_once "header.php"; ?>
        <link rel="stylesheet" href="css_textarea.css" type="text/css" media="all" />
		<script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <?php include_once "nav_header.php"; ?>
            <form method="post" action="gravar_noticia.php" enctype="multipart/form-data" name="cadastro">
                <div class="container" align="center">
                    <h5><label>Titulo</label></h5>
                    <textarea rows="1" class="w-50 rounded mb-4" name="titulo"></textarea>
                </div>
                <div class="container" align="center">
                    <h5><label>Lide</label></h5>
                    <textarea rows="2" class="w-50 rounded mb-4" name="lide"></textarea>
                </div>
                <div class="form-group" align="center">
                    <h5><label for="conteudo">Conteudo</label></h5>
                    <textarea class="rounded w-75" rows="5" id="area" name="conteudo"></textarea>
                </div>
                <div class="mt-5" align="center">
                    <h5>Gênero: 
                        <select name="genero_noticia" class="h6 btn border">
                            <option value="Administracao">Administração</option>
                            <option value="Agropecuaria">Agropecuária</option>
                            <option value="IFFgeral">IFF geral</option>
                            <option value="Informatica">Informática</option>
                            <option value="Veterinaria">Veterinária</option>
                            <option value="Reportagem">Reportagem</option>
                            <option value="Cronica">Crônica</option>
                            <option value="Poema">Poema</option>
                            <option value="Contos">Contos</option>
                            <option value="Oficinas">Oficinas</option>
                            <option value="Pesquisa">Pesquisa</option>
                            <option value="Extensao">Extensão</option>
                            <option value="Ensino">Ensino</option>agr
                        </select>
                    </h5>
                    <h5>Autor: <input type="text" name="autor" class="h6 btn border"></h5>
                    <h5>Imagem: <input type="file" name="imagem" class="h6 col-12 col-md-4 mt-2 btn border"></h5>
                    <h5><label>Legenda da Imagem</label></h5>
                    <textarea rows="1" class="w-50 rounded mb-4" name="legenda"></textarea>
                </div>
                <div class="container mb-5" align="center">
                    <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR NOTICIAS" class="btn btn-primary mt-3">
                </div>
            </form>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/popper.js/dist/popper.js"></script>
        <script src="node_modules/bootstrap/dist/js//bootstrap.js"></script>
    </body>
</html>