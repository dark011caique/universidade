<?php
// perfil.php
session_start();

include 'C:\wamp64\www\banco\conf\config.php';

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
mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <style>
        body {
            background-color: <?php echo $_SESSION['cor_fundo']; ?>;
        }
    </style>
</head>
<body>

    <a href="cor.php">escolha sua cor de fundo</a><br><br>
    <a href="professores.php">meus professores</a>
    <h1>Perfil do Usuário</h1>
    <p>Nome: <?php echo $_SESSION['nome']; ?></p>
    <p>Matrícula: <?php echo $_SESSION['MAT']; ?></p>
    <p>Cor de Fundo: <?php echo $_SESSION['cor_fundo']; ?></p>
    <a href="login.php">Sair</a>
</body>
</html>

