<?php

session_start();

include 'C:\wamp64\www\banco\conf\config.php';

$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];

    $resul = mysqli_query($conexao, "INSERT INTO `alunos`(`nome`, `endereco`, `cidade`, `cor_fundo`) VALUES ('$nome','$endereco','$cidade','')");

    if ($resul) {
        echo "Cadastrado com sucesso";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    //header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>
<body>

    <a href="login.php">Voltar</a>
    <h1>Cadastre-se</h1>
    
    <div>
        <form action="testeCadastro.php" method="POST">
            <input type="hidden" name="MAT">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>
            <br><br>
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" required>
            <br><br>
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" required>
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
