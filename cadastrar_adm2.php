<?php
if (!isset($_SESSION)) session_start();
$nome = $_SESSION['nome_adm'];
$email = $_SESSION['email_adm'];
$senha = $_SESSION['senha_adm'];

include_once "conexao.php";
$query_select = "SELECT nome, email FROM ADM WHERE nome LIKE '$nome' AND email LIKE '$email'";
$result_select = mysqli_query ($dbc, $query_select) or die ('Erro ao executar o comando sql!DEBUG');
$array = mysqli_fetch_array ($result_select);
$logarray = $array['login'];

if (($array['nome'] == $nome) && ($array['email'] == $email)) {
    echo "<script> alert ('Oops, ja existe um usuario com esse nome e/ou esse email')</script>";
    echo "<script> window.location.href = 'cadastrar.php'</script>";
} else {
            if ($nome == '' || $nome == null) {
                echo "<script> alert ('O campo nome deve ser preenchido')</script>";
                echo "<script> window.location.href = 'cadastrar.php'</script>";
            } else {
                if ($email == '' || $email == null) {
                    echo "<script> alert ('O campo email deve ser preenchido')</script>";
                    echo "<script> window.location.href = 'cadastrar.php'</script>";
                } else {
                    if ($senha == '' || $senha == null) {
                       echo "<script> alert ('O campo senha deve ser preenchido')</script>";
                       echo "<script> window.location.href = 'cadastrar.php'</script>";
                    } else {
                    $query_insert = "INSERT INTO ADM (nome, senha, email, tipo) VALUES ('$nome', '$senha', '$email', 'adm')";
                    $insert = mysqli_query($dbc, $query_insert) or die ('Erro ao executar o comando');
                        }
                    }

                if ($insert) {
                    echo "<script> alert ('Adm cadastrado com sucesso!')</script>";
                    echo "<script> window.location.href = 'index.php'</script>";
                } else {
                    echo "<script> alert ('Não foi possivel cadastrar!')</script>";
                    echo "<script> window.location.href = 'index.php'</script>";
                }
            }
        }
mysqli_close($dbc);
?>