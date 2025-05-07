
<?php
//incluir os dados da conexao.php
include("conexao.php");

//verificar se os campos não nulos 
    if(isset($_POST['isbn']) && isset($_POST['titulo']) &&
        isset($_POST['ano_publicacao']) && isset($_POST['quantidade_estoque']) &&
        isset($_POST['preco']) ){
            $isbn  = mysqli_real_escape_string($conexao, $_POST['isbn']);
            $titulo =  mysqli_real_escape_string($conexao, $_POST['titulo']);
            $ano_publicacao =  mysqli_real_escape_string($conexao, $_POST['ano_publicacao']);
            $quantidade_estoque = mysqli_real_escape_string($conexao, $_POST['quantidade_estoque']);
            $preco =  mysqli_real_escape_string($conexao,$_POST['preco']);
            $id_autor  = mysqli_real_escape_string($conexao,  $_POST['id_autor']);
       
            $sql = " insert into tb_livros (isbn, titulo, ano_publicacao, quantidade_estoque,
                     preco, id_autor) values ('$isbn', '$titulo', '$ano_publicacao',
                     '$quantidade_estoque','$preco', '$id_autor')";
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