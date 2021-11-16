<?php 
namespace Source\Classes\Services;

trait RenderizaHTML{
    
    public function renderizaHTML($rota, $dados){
        extract($dados);
        require_once "../views/" . $rota . ".php";
        $titulo;
    }
}