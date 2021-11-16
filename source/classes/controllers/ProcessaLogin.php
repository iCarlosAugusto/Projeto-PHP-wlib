<?php
namespace Source\Classes\Controllers;
use Source\Classes\Controllers\IControllerInterface;
use Source\Classes\Services\FlashMensage;

//$_SESSION['permissão'] !== true ? header("Location: /login") : null;

class ProcessaLogin implements IControllerInterface{
    use FlashMensage;
    
    
    public function processaRequisicao(){
        require_once "../model/Conexao.php";
        $senhaCritografada = sha1($_POST['senha']);

        $conexao = novaConexao();
        $sql = "SELECT * from tabelausuarios WHERE email = ? AND senha = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $_POST['email'], $senhaCritografada);
        $stmt->execute();
        $array = $stmt->get_result()->fetch_assoc();
       
        if(empty($array) === false){
            $_SESSION['dados'] = $array;
            header("Location: /dashboard");
        }else{
            $this->renderizaMensagem("alert alert-danger", "Email e/ou senha incorretos.");
            header("Location: /login");
        };
    }
}