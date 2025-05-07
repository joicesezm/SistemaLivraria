
<?php
//incluir os dados da conexao.php
include("conexao.php");

//verificar se os campos não nulos 
    if(isset($_POST['nome']) && isset($_POST['cpf']) &&
        isset($_POST['dtNascimento']) && isset($_POST['email']) &&
        isset($_POST['telefone']) ){
            $cpf  = mysqli_real_escape_string($conexao, $_POST['cpf']);
            $nome =  mysqli_real_escape_string($conexao, $_POST['nome']);
            $dataNascimento =  mysqli_real_escape_string($conexao, $_POST['dtNascimento']);
            $email = mysqli_real_escape_string($conexao, $_POST['email']);
            $telefone =  mysqli_real_escape_string($conexao,$_POST['telefone']);
            $sexo  = mysqli_real_escape_string($conexao,  $_POST['sexo']);
       
            $sql = " insert into tb_cliente (cpf, nome, email, telefone,
                     data_nascimento, sexo) values ('$cpf', '$nome', '$email', '$telefone',
                             '$dataNascimento', '$sexo')";
            if (mysqli_query($conexao, $sql)){
                echo " <br> Dados salvos no banco de dados";
            }else{
                echo " <br> Erro ao salvar!". mysqli_error($conexao);
            }
        }else{
            echo " Preencha todos os dados";
        }
mysqli_close($conexao);

?>