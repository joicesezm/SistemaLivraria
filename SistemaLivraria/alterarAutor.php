
<?php
include("conexao.php");

if (
    isset($_POST['id_autor']) && isset($_POST['nome']) &&
    isset($_POST['dtNascimento']) && !empty($_POST['id_autor']) &&
    !empty($_POST['nome']) && !empty($_POST['dtNascimento'])){
        $id_autor = mysqli_real_escape_string($conexao, $_POST['id_autor']);
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $dtNascimento = mysqli_real_escape_string($conexao, $_POST['dtNascimento']);

        $sql = "update tb_autor set 
                    nome = '$nome', 
                    data_nascimento = '$dtNascimento' 
                where id_autor = '$id_autor'";
        
        if( mysqli_query($conexao, $sql) ){
            echo " Autor alterado com sucesso!";
        }else{
            echo " Erro ao alterar:" . mysqli_error($conexao);
        }
    }else{
        echo " Dados incompletos!";
    }
    mysqli_close($conexao);

?>