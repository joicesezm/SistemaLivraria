<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "db_livraria";

$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
    
    if (!$conexao) {
        die(" Falha na conexão do Banco de dados:"
            . mysqli_connect_error());
    } else {
       echo " ";
    }
?>