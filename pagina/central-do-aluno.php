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
    <link rel="stylesheet" href="../css/central.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Centeal do aluno</title>
</head>
<body>
    <div class="row">
    <div id="logo" class="col-12 col-md-6 d-flex justtify-content-md-start justify-content-center p-md-5 ml-md-5 mt-md-0 mt-5">

    <img src="../img/logo.png" alt="">

    </div>

    <div class="col-12 offset-sm-6 offset-md-0 col-md-5 col-sm-6 mt-5 mt-sm-5 p-0">
        <h3 class="">
            "olá, "
            <b><?php echo $_SESSION['nome']; ?></b>
            <br>
            <span class="bem-vindo">Bem vindo(a) ao painel de acesso rapido!</span>
            <br>
            <a href="login.php" class="btn m-btn--pill btn-danger m-btn--custom m-btn--label m-btn--bolder btn-sair" >Sair</a>
        </h3>
    </div>

    </div>
</body>
</html>