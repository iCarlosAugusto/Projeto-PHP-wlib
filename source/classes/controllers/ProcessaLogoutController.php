<?php
namespace Source\Classes\Controllers;
use Source\Classes\Controllers\IControllerInterface;

class ProcessaLogoutController implements IControllerInterface{
    public function processaRequisicao(){
        unset($_SESSION['status']);
        unset($_SESSION['dados']);
        header("Location: /login");
    }
}