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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/icon1.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login/main.css">
    <link rel="stylesheet" href="../css/login/menu.css">
    <link rel="stylesheet" href="../css/login/responsivo.css">

    <title>Boku no Hero</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <a href="inde.html"><img src="../img/img-boku/icon.png" alt=""></a>
            </div>

            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="../home/episodios.html" class="nav-link">Episodios</a></li>
                    <li class="nav-item"><a href="../home/detalhes.html" class="nav-link">Detalhes</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link">Home</a></li>
                </ul>
            </div>

            <div class="nav-botao">
                <button><a href="../cadastro/cadastre-se.php">Cadastre-se</a></button>
            </div>

            <div class="mobile-menu-icon">
                <button><img onclick="menuShow()" src="./imgs/icons8-menu-rounded-32.png" alt=""></button>
            </div>
        </nav>

        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="../home/episodios.html" class="nav-link">Episodios</a></li>
                <li class="nav-item"><a href="../home/detalhes.html" class="nav-link">Detalhes</a></li>
                <li class="nav-item"><a href="../cadastro/cadastre-se.php" class="nav-link"  id="cadastro">Cadastre-se</a></li>
            </ul>
            
        </div>
    </header>
    
    <main>
        <aside>
            <div class="texto">
                <form action="testeLogin.php" method="POST">
                    <div class="text-img">
                        <img src="../img/img-login/png___boku_no_hero_academia_logo_by_chicashipera_dbd702g-fullview.png" alt="logo title" >
                    </div>
                    
                    <div class="paragrafo">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi similique tempore excepturi necessitatibus, itaque eos quaerat adipisci vitae a, nulla ipsum possimus rerum hic voluptatibus, dolores cupiditate sint. Obcaecati, nemo?</p>
                    </div>
        
                    <div class="grupo-input">
                        <div class="input-box">
                        <input type="text" name="MAT" placeholder="MAT">

                        <input type="text" name="nome" placeholder="Nome">

                        <input type="submit" name="submit" value="Entrar">
                        </div>
                    </div>
                    <div class="Cadastrese">
                        <button><a href="../cadastro/cadastre-se.php">Cadastre-se</a></button>
                    </div>
                </form>
                <div class="logo-form">
                    <img class="img-baner" src="../img/img-login/form.png" alt="">
                </div>
            </div>
        </aside>

    </main>
    <script src="./Home/js/script.js"></script>
</body>
</html>