<?php

session_start();

include'../conf/config.php';

$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

if ($conexao) {
    
    // Verificar se o usuário fez login
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $MAT = $_POST['MAT'];
        $nome = $_POST['nome'];

        // Verificar as credenciais no banco de dados
        $query = "SELECT * FROM alunos WHERE MAT = 'MAT' AND nome = '$nome'";
        $result = mysqli_query($conexao, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Credenciais corretas, iniciar a sessão para o usuário
            $_SESSION['MAT'] = $MAT;
            header('Location: perfil.php');
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
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>

</head>
<body>
<main>
<a class="link-voltar" href="home.php">Voltar</a>
    <aside>
    
        <div class="login">
            <h1 class="logo">Login</h1>
            <form action="testeLogin.php" method="POST">
                <div class="grupo-input">

                    <div class="input-box">

                        <input type="text" name="MAT" placeholder="MAT">

                        <input type="text" name="nome" placeholder="Nome">

                        <input type="submit" name="submit" value="Entrar">

                        <div class="Cadastrese">
                        
                        <button><a href="../cadastro/cadastre-se.php">Cadastre-se</a></button>

                        </div>

                    </div>


                </div>
            </form>
        </div>
        <br>
</body>
    </aside>
</main>
</body>
</html>