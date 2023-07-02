<?php
// salvar_cor.php
session_start();

include 'C:\wamp64\www\banco\conf\config.php';

if (!isset($_SESSION['MAT'])) {
    // Usuário não autenticado, redirecionar para a página de login ou exibir uma mensagem de erro
    header('location: login.php');
    exit;
}

$matricula = $_SESSION['MAT'];

// Obter a cor de fundo enviada pelo formulário
$cor = $_POST['cor'];

// Salvar a cor de fundo no perfil do usuário (arquivo de configuração)
$_SESSION['cor_fundo'] = $cor;

// Salvar a cor de fundo no banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'universidade');
// Verificar se a conexão foi estabelecida com sucesso
if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit;
}

// Consulta SQL para verificar se o registro já existe
$consulta = "SELECT * FROM alunos WHERE MAT = '$matricula'";

// Executar a consulta
$resultado = mysqli_query($conexao, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // O registro já existe, atualizar o valor da coluna "cor_fundo"
    $atualizar = "UPDATE alunos SET cor_fundo = '$cor' WHERE MAT = '$matricula'";
    mysqli_query($conexao, $atualizar);
} else {
    // O registro não existe, inserir um novo registro
    $inserir = "INSERT INTO alunos (MAT, cor_fundo) VALUES ('$matricula', '$cor')";
    mysqli_query($conexao, $inserir);
}

mysqli_close($conexao);

// Redirecionar para a página do perfil do usuário ou exibir uma mensagem de sucesso
header('location: perfil.php');
exit;
?>
