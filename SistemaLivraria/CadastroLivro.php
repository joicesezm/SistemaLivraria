<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de cadastro de Livros</title>
    <link rel="stylesheet" href="estilosDeCadastro.css"/>
</head>
<body>
<?php
    include("conexao.php");
    $sql = " select id_autor, nome from tb_autor";
    $result = $conexao->query($sql);
?> 
    <form name="CadLivro" id="CadLivro" method="post" 
                action="cadastroLivroParte2.php">
        <h2> Cadastro de Livro </h2>
        <div>
            <label for="isbn">ISBN:</label>
            <input name="isbn" id="isbn" type="text" />
        </div>
        <div>
            <label for="titulo">Titulo:</label>
            <input name="titulo" id="titulo" type="text" placeholder="Digite seu Titulo:"/>
        </div>
        <div>
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao"/>
        </div>
        <div>
            <label for="quantidade_estoque">Quantidade de estoque:</label>
            <input type="number" name="quantidade_estoque" id="quantidade_estoque"/>
        </div>
        <div>
            <label for="preco">Preço:</label>
            <input type="text" name="preco" id="preco"/>
        </div>
        <div>
            <label for="id_autor">Autor:</label>
            <select name="id_autor" id="id_autor" required>
            <option value="">Selecione um autor</option>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_autor"] . "'>" . 
                        htmlspecialchars($row["nome"]) . "</option>";
                }
            } else {
                echo "<option value=''>Nada encontrado!</option>";
            }
            ?>
            </select>
        </div>
        <button type="submit" name="enviar" value="Cadastrar">Cadastrar</button>
        <button type="reset" name="limpar" value="Resetar">Limpar</button>
    </form>
    
</body>
</html>