<?php
namespace Source\Classes\Controllers;

use Source\Classes\Controllers\IControllerInterface;
use Source\Classes\Services\RenderizaHTML;

class CadastroController implements IControllerInterface{
    use RenderizaHTML;

    public function processaRequisicao(){
        $this->renderizaHTML("cadastro",[
            "titulo" => "Cadastro"
        ]);
    }
}