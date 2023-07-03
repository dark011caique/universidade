<?php
include 'C:\wamp64\www\banco\conf\config.php';

if (!isset($_SESSION['MAT'])) {
    // Usuário não autenticado, redirecionar para a página de login ou exibir uma mensagem de erro

}

// Conectar ao banco de dados
$conexao = mysqli_connect('localhost','root','','universidade');

// Verificar se a conexão foi estabelecida com sucesso
if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit;
}

// Consulta SQL para obter a cor de fundo do usuário
$matricula = $_SESSION['MAT'];
$sql = "SELECT cor_fundo FROM alunos WHERE MAT = '$matricula'";

// Executar a consulta
$resultado = mysqli_query($conexao, $sql);

// Verificar se a consulta retornou algum resultado
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obter o valor da coluna "cor_fundo"
    $row = mysqli_fetch_assoc($resultado);
    $corFundo = $row['cor_fundo'];

    // Atribuir a cor de fundo à variável de sessão
    $_SESSION['cor_fundo'] = $corFundo;
}

// Fechar a conexão com o banco de dados


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>

    <style>
        body {
            background-color: <?php echo $_SESSION['cor_fundo']; ?>;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        

        <div class="d-flex"> 
            <a href="cor.php" class="btn btn-danger me-5">escolha sua cor de fundo</a>
            <a href="professores.php" class="btn btn-danger me-5">Meus professores</a>
            <a href="disciplinas.php" class="btn btn-danger me-5">Disciplina</a>
            <a href="" class="btn btn-danger me-5">Historico</a>
            <a href="alunos.php" class="btn btn-danger me-5">Alunos</a>
            <a href="" class="btn btn-danger me-5">Turma</a>
            <a href="perfil.php" class="btn btn-danger me-5">Perfil</a>
        </div>
    </nav>
</body>
</html>