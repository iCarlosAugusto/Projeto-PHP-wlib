<?php 
namespace Source\Classes\Controllers;

use Source\Classes\Controllers\IControllerInterface;
use Source\Classes\Services\RenderizaHTML;

class DashboardController implements IControllerInterface{
    use RenderizaHTML;

    public function processaRequisicao(){
        $this->renderizaHTML("dashboard", [
            "titulo" => "Darshboard"
        ]);
    }
}