<?php

function novaConexao($banco="usuarios"){
        $servidor = '127.0.0.1:3306';
        $usuario ='root';
        $senha ='root';
        $conexao = new mysqli($servidor, $usuario, $senha, $banco);
        
        return $conexao;
    }
