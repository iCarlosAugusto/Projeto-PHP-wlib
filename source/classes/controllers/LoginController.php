<?php 
namespace Source\Classes\Controllers;

use Source\Classes\Controllers\IControllerInterface;
use Source\Classes\Services\RenderizaHTML;

class LoginController implements IControllerInterface{
    use RenderizaHTML;

    public function processaRequisicao(){
        $this->renderizaHTML("login", [
            "titulo" => "Login"
        ]);
    }
}