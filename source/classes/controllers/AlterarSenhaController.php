<?php 
namespace Source\Classes\Controllers;

use Source\Classes\Controllers\IControllerInterface;
use Source\Classes\Services\RenderizaHTML;

class AlterarSenhaController implements IControllerInterface{
    use RenderizaHTML;

    public function processaRequisicao(){

        $this->renderizaHTML("alterarSenha", [
            "titulo" => "Alteração de senha"
        ]);
    }
}