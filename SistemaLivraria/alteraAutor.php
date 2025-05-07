<?php
include("conexao.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM tb_autor WHERE id_autor = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $autor = mysqli_fetch_assoc($resultado);
        $dataFormatadaNascimento = date('Y-m-d', strtotime($autor['data_nascimento']));
    } else {
        echo "Autor não encontrado";
        exit;
    }
} else {
    echo "ID não fornecido";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Autor</title>
</head>
<body>
    <h2>Alterar Autor</h2>
    <form method="post" action="AlterarAutor.php">
        <input type="hidden" name="id_autor" value="<?= $autor['id_autor'] ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($autor['nome']) ?>" required><br><br>

        <label for="dtNascimento">Data de Nascimento:</label>
        <input type="date" name="dtNascimento" id="dtNascimento" value="<?= $dataFormatadaNascimento ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
