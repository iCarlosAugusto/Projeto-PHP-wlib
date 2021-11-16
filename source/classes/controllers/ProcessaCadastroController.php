<?php
namespace Source\Classes\Controllers;

use Source\Classes\Controllers\IControllerInterface;
use Source\Classes\Services\FlashMensage;
use Source\Classes\Services\VerificaBD;


//$_SESSION['permissão'] !== true ? header("Location: /cadastrar") : null;

class ProcessaCadastroController extends VerificaBD implements IControllerInterface{
    use FlashMensage;
  

    public function processaRequisicao(){
        $this->filtraDados();
    }

    private function filtraDados(){
        
       $dadosForm = [
           "nome" => FILTER_SANITIZE_STRING,
           "cpf" => FILTER_SANITIZE_NUMBER_INT,
           "data_nascimento" => FILTER_SANITIZE_STRING,
           "email" => FILTER_VALIDATE_EMAIL,
           "senha" => FILTER_SANITIZE_STRING,
       ];

       $dadosFiltrados = filter_input_array(INPUT_POST, $dadosForm);
       $dadosFiltrados['senha'] = sha1($dadosFiltrados['senha']);
       $dadosValidos = array_values($dadosFiltrados);

       //$dadosValidos[2] =(new DateTime())->format('d-m-Y H:i:s');

       $this->verificaUsuarioExistente($dadosValidos);
    }

    private function verificaUsuarioExistente($dados){
        require_once "../model/Conexao.php";
        $conexao = novaConexao();

        $dadosVerificar = array(
            $dados[3],
            $dados[1],
        );
        
        $sql = "SELECT email, cpf FROM tabelausuarios WHERE email = ? OR cpf = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("si", ...$dadosVerificar);
        $stmt->execute();
        $array = $stmt->get_result()->fetch_row();
        $this->verificaBD($array, $dados) == true ? $this->inserirUsuario($dados) : null;
        
        }

        private function inserirUsuario($dados){
            require_once "../model/Conexao.php";
            $conexao = novaConexao();
    
            $sql = "INSERT INTO tabelausuarios (nome, cpf, data_nascimento, email, senha) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sidss", ...$dados);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                $this->renderizaMensagem("alert alert-success", "Registrado com sucesso!");
                header("Location: /login");
            }else{
                echo "Algo de errado aconteceu, contate o suporte.";
            }
            $stmt->close();
        }
    }
    

    
