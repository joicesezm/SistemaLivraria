<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="estilosDeCadastro.css" />
</head>
<body>
    <h2>Cadastrar Novo Livro</h2>

    <form method="POST" action="cadastrarLivro.php">
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" required><br><br>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" id="ano_publicacao" required><br><br>

        <label for="quantidade_estoque">Quantidade em Estoque:</label>
        <input type="number" name="quantidade_estoque" id="quantidade_estoque" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" id="preco" required><br><br>

        <label for="id_autor">Autor:</label>
        <select name="id_autor" id="id_autor" required>
            <option value="">Selecione um autor</option>
            <?php
            include("conexao.php");

            $sql = "SELECT id_autor, nome FROM tb_autor ORDER BY nome";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($autor = $resultado->fetch_assoc()) {
                    echo "<option value='{$autor['id_autor']}'>{$autor['nome']}</option>";
                }
            } else {
                echo "<option value=''>Nenhum autor encontrado</option>";
            }

            ?>
        </select><br><br>

        <button type="submit" name="cadastrar">Cadastrar Livro</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("conexao.php");

    $isbn = mysqli_real_escape_string($conexao, $_POST['isbn']);
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $ano = (int) $_POST['ano_publicacao'];
    $estoque = (int) $_POST['quantidade_estoque'];
    $preco = (float) $_POST['preco'];
    $id_autor = (int) $_POST['id_autor'];

    if ($id_autor > 0) {
        $sql = "INSERT INTO tb_livro (isbn, titulo, ano_publicacao, quantidade_estoque, preco, id_autor)
                VALUES ('$isbn', '$titulo', $ano, $estoque, $preco, $id_autor)";

        if ($conexao->query($sql) === TRUE) {
            echo "<p>Livro cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar: " . $conexao->error . "</p>";
        }
    } else {
        echo "<p>Por favor, selecione um autor válido.</p>";
    }

    $conexao->close();
}
?>

</body>
</html>
