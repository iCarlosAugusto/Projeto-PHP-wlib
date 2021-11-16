<?php

use Source\Classes\Controllers\CadastroController;
use Source\Classes\Controllers\ProcessaCadastroController;
use Source\Classes\Controllers\LoginController;
use Source\Classes\Controllers\ProcessaLogin;
use Source\Classes\Controllers\DashboardController;
use Source\Classes\Controllers\AlterarSenhaController;
use Source\Classes\Controllers\processaAlterarSenha;
use Source\Classes\Controllers\ProcessaLogoutController;

$routes = [
    "/login" => LoginController::class,
    "/cadastrar" => CadastroController::class,
    "/processaCadastroController" => ProcessaCadastroController::class,
    "/processaLogin" => ProcessaLogin::class,
    "/dashboard" => DashboardController::class,
    "/dashboard/alterarSenha" => AlterarSenhaController::class,
    "/processaAlterarSenha" => processaAlterarSenha::class,
    "/logout" => ProcessaLogoutController::class,
];

return $routes;