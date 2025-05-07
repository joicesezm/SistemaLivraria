<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Livros</title>
    <link rel="stylesheet" href="estilosDeCadastro.css" />
</head>
<body>
    <h2> Busca de livros </h2>
    <form method="$_GET" action="buscarLivro.php">
        <label for="busca" >Buscar por ISBN ou Titulo:</label>
        <input type="text" name="busca" id="busca" placeholder="Informe o ISBN ou Titulo::"/>
        <button type="submit" name="buscar">Buscar</button>
    </form>
<?php
    if(isset($_GET['busca']) && !empty(trim($_GET['busca']))){
        include("conexao.php");

    $busca = mysqli_real_escape_string($conexao, $_GET['busca']);
    $sql = "select l.*, a.nome AS nome_autor
            from tb_livros l
             join tb_autor a on l.id_autor = a.id_autor
            where 
              l.titulo like '%$busca%' or l.isbn like '%$busca'";

    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0){// se houver linhas
        echo "<table border='1' cellpadding='10'>";
            echo "<tr>
            <th> ISBN</th>
            <th> Titulo</th>
            <th> Ano</th>
            <th> Estoque</th>
            <th> Preço</th>
            <th> autor</th>";
            while($row = $resultado->fetch_assoc()){
                echo "<tr>
                <td> {$row['isbn']}</td> 
                <td> {$row['titulo']}</td>
                <td> {$row['ano_publicacao']}</td>
                <td> {$row['quantidade_estoque']}</td>
                <td> {$row['preco']}</td>
                <td> {$row['nome_autor']}</td>
                <td>
                <a href='alteraLivro.php?id={$row['isbn']}'>Alterar </a>
                 <a href='excluirLivro.php?id={$row['isbn']}'
                     onclick=\"return confirm('Excluir mesmo o livro?')\"> Excluir </a>
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