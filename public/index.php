<?php

require_once "routes.php";
require_once "../vendor/autoload.php";

$url = $_SERVER['PATH_INFO'];
session_start();

if(isset($_SESSION['dados']) === false && $url !== "/cadastrar"  && $url !== "/login" && $url !== "/processaLogin" 
    && $url !== "/processaCadastroController" && $url !== "/logout"){
        header("Location: /login");
        exit();
};

if(array_key_exists($url, $routes)){
    $controller = $routes[$url];
    $c = new $controller();
    $c ->processaRequisicao();
}else{
    echo "pagina não existe";
}