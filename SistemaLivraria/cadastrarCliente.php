<?php

include ("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cpf = htmlspecialchars(trim($_POST["cpf"] ?? ''));
    $nome = htmlspecialchars(trim($_POST["nome"] ?? ''));
    $dtNascimento = htmlspecialchars(trim($_POST["dtNascimento"] ?? ''));
    $email = htmlspecialchars(trim($_POST["email"] ?? ''));
    $telefone = htmlspecialchars(trim($_POST["telefone"] ?? ''));
     
    $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : 'Feminino'; 

    // Exibe os dados recebidos
    echo "<h2>Dados recebidos:</h2>";
    echo "CPF: $cpf<br>";
    echo "Nome: $nome<br>";
    echo "Data de Nascimento: $dtNascimento<br>";
    echo "Email: $email<br>";
    echo "Telefone: $telefone<br>";
    echo "Sexo: $sexo<br>";
} else {
    echo "Formulário não enviado corretamente.";
}
?>
