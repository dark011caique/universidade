<?php

session_start();
include"../conf/config.php";

if (!isset($_SESSION['MAT'])) {
    // Usuário não autenticado, redirecionar para a página de login ou exibir uma mensagem de erro
    header('location: login.php');
    exit;
}

// Conectar ao banco de dados
$conexao = mysqli_connect('localhost','root','','universidade');

// Verificar se a conexão foi estabelecida com sucesso
if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centeal do aluno</title>
</head>
<body>
    <div class="row">
    <div id="logo">

    </div>

    <div class="">
        <h3 class="">
            "olá, "
            <b><?php echo $_SESSION['nome']; ?></b>
            <br>
            <span class="bem-vindo">Bem vindo(a) ao painel de acesso rapido!</span>
            <br>
            <a class="link-voltar" href="home.php">Sair</a>
        </h3>
    </div>

    </div>
</body>
</html>