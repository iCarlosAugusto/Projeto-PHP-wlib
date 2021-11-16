<?php
namespace Source\Classes\Services;
use Source\Classes\Services\FlashMensage;

abstract class VerificaBD {
    use FlashMensage;
    
    public function verificaBD($tentativa, $dados){
        $resultado = "";
    
        if(is_null($tentativa) == true){
            $resultado = true;
        }else{
            if($tentativa[0] == $dados[3]){
                $this->renderizaMensagem("alert alert-danger", "Esse email já é usado por outro usuário");
                $resultado = false;
                $_SESSION['dadosForm'] = $dados;
                header("Location: /cadastrar");
            }
    
            if($tentativa[1] == $dados[1]){
                
                $this->renderizaMensagem("alert alert-danger", "CPF já está sendo usado por outro usuário");
                $resultado = false; 
                $_SESSION['dadosForm'] = $dados;
                header("Location: /cadastrar");
            }
        }
        return $resultado;
    }
}
