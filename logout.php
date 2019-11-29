<?php
session_start();
if (isset($_SESSION['login'])){
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time() - 3600);
    }
    session_destroy();
}

if (isset($_SESSION['login_adm'])){
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time() - 3600);
    }
    session_destroy();
}

setcookie('login', '', time() - 3600);
setcookie('login_adm', '', time() - 3600);

$home_url = 'http://' .$_SERVER['HTTP_HOST'] .dirname($_SERVER['PHP_SELF']) .'/index.php';
header ('Location: ' .$home_url);
?>