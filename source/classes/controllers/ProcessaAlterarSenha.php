<?php 
namespace Source\Classes\Controllers;

use Source\Classes\Controllers\IControllerInterface;
use Source\Classes\Services\VerificaBD;
use Source\Classes\Services\FlashMensage;

/*
 SANITEZE_STRING


*/
class processaAlterarSenha implements IControllerInterface{
    use FlashMensage;

    public function processaRequisicao(){

        $id = $_SESSION['dados']['id'];
        $senhaOriginal = sha1($_SESSION['dados']['senha']);

        $arrayInput = [
            "senhaAtual" => FILTER_SANITIZE_STRING,
            "senhaNova" => FILTER_SANITIZE_STRING
        ];
        $arrayInput['senhaNova'] = sha1($arrayInput['senhaNova']);
        $arrayInput['senhaAtual'] = sha1($arrayInput['senhaAtual']);

        $array = filter_input_array(INPUT_POST, $arrayInput);
        extract($array);
        $senhaAtual = sha1($senhaAtual);
        $senhaNova = sha1($senhaNova);
        
        if($this->verificaSenhaBD($senhaAtual, $id) == true){
            $this->alterarSenhaBD($senhaNova, $id);
        }
    }

    private function verificaSenhaBD($senhaAtual, $id){
        require_once "../model/Conexao.php";

        $conexao = novaConexao();
        $sql = "SELECT * FROM tabelausuarios WHERE id = ? and senha = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("is", $id, $senhaAtual);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows == 0){
            header("Location: /dashboard/alterarSenha");
            $this->renderizaMensagem("alert alert-danger", "A senha oferecida está incorreta :(");
            return false;
            exit();
        }
        return true;
    }

    private function alterarSenhaBD($senhaNova, $id){
        require_once "../model/Conexao.php";
        $conexao = novaConexao();

        $sql = "UPDATE tabelausuarios SET senha = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("si", $senhaNova, $id);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $this->renderizaMensagem("alert alert-success", "Senha alterada com sucesso!");
            header("Location: /dashboard");
            exit();
        }else{
            echo "Algo aconteceu... contate o suporte";
        }
    }
}