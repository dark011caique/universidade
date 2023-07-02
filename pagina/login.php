<?php

session_start();

$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

if ($conexao) {
    
    // Verificar se o usuário fez login
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $MAT = $_POST['MAT'];
        $nome = $_POST['password'];

        // Verificar as credenciais no banco de dados
        $query = "SELECT * FROM alunos WHERE MAT = 'MAT' AND nome = '$nome'";
        $result = mysqli_query($conexao, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Credenciais corretas, iniciar a sessão para o usuário
            $_SESSION['MAT'] = $MAT;
            header('Location: sistema.php');
            exit;
        } else {
            echo "Credenciais inválidas!";
        }
    }
} else {
    echo "Erro ao conectar-se ao banco de dados: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="home.php">Voltar</a>
        <div>
            <h1>Login</h1>
            <form action="testeLogin.php" method="POST">
                <input type="text" name="MAT" placeholder="MAT">
                <br>
                <br>
                <input type="text" name="nome" placeholder="Nome">
                <br>
                <br>
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
        <br>
        <a href="cadastre-se.php">Cadastre-se</a>
</body>
</html>