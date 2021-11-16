<?php
namespace Source\Classes\Services;

trait FlashMensage{

    public function renderizaMensagem($status, $mensagem){
        $_SESSION['status'] = $status;
        $_SESSION['mensagem'] = $mensagem;
    }
}