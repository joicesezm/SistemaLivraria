<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Autores</title>
    <link rel="stylesheet" href="estilosDeCadastro.css" />
</head>
<body>
    <h2> Busca de Autores </h2>
    <form method="$_GET" action="buscarCliente.php">
        <label for="busca" >Buscar Nome:</label>
        <input type="text" name="busca" id="busca" placeholder="Informe Nome::"/>
        <button type="submit" name="buscar">Buscar</button>
    </form>
<?php
    if(isset($_GET['busca'])  ){
        include("conexao.php");

    $busca = mysqli_real_escape_string($conexao, $_GET['busca']);
    $sql = "select * from tb_autor where nome LIKE '%$busca%'";

    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0){// se houver linhas
        echo "<table border='1' cellpadding='10'>";
            echo "<tr>
            <th> ID</th>
            <th> Nome</th>
            <th> Data de Nascimento</th></tr>";
            while($row = $resultado->fetch_assoc()){
                echo "<tr>
                <td> {$row['id_autor']}</td> 
                <td> {$row['nome']}</td>
                <td> {$row['data_nascimento']}</td>
                <td>
                <a href='alteraAutor.php?id={$row['id_autor']}'>Alterar </a>
                 <a href='excluirAutor.php?id={$row['id_autor']}'
                     onclick=\"return confirm('Excluir mesmo o Autor?')\"> 
                             Excluir </a>
                </td>
                </tr>";
            }
    
    }else{
        echo "<p> Nenhuma Linha encontrada </p>";
    }
}
?>

</body>
</html>