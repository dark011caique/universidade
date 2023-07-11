<?php

session_start();

include 'C:\wamp64\www\banco\conf\config.php';

$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $sexo = $_POST['gender'];

    $resul = mysqli_query($conexao, "INSERT INTO `alunos`(`nome`, `endereco`, `cidade`, `cor_fundo`,  `sexo`) VALUES ('$nome','$endereco','$cidade','', '$sexo')");

    if ($resul) {
        echo "Cadastrado com sucesso";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    //header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img-boku/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cadastro/cadastro.css">
    <link rel="stylesheet" href="../css/cadastro/responsivo.css">
    <title>Document</title>

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
            <div class="mobile-menu-icon">
                <button><img onclick="menuShow()" src="../img/img-boku/icons8-menu-rounded-32.png" alt=""></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="../home/episodios.html" class="nav-link">Episodios</a></li>
                <li class="nav-item"><a href="../home/detalhes.html" class="nav-link">Detalhes</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Home</a></li>
            </ul>
        </div>
    </header>

    <main>
        <aside>
            <div class="container">
                <div class="form-image">
                    <img src="../img/img-boku/Dark.png" alt="">
                </div>
                <div class="form">
                    <form action="testeCadastro.php" method="POST">
                        <div class="form-header">
                            <div class="title">
                                <h1>cadastre-se</h1>
                            </div>
                
                        </div>
                        <div class="input-group">
                            <div class="input-box">
                                <input type="hidden" name="MAT">
                            </div>
        
                            <div class="input-box">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" required>
                            </div>
        
                            <div class="input-box">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" id="endereco" required>
                            </div>
        
                            <div class="input-box">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" required>
                            </div>
        
<!--                            <div class="input-box">
                                <label for="password">Senha</label>
                                <input id="password" type="password" name="password" placeholder="Digite seu senha" required >
                            </div>
        
                            <div class="input-box">
                                <label for="confirmpassword">Confirme sua senha</label>
                                <input id="confirmpassword" type="password" name="confirmpassword" placeholder="confirme sua senha" required >
                            </div>-->
                        </div>
        
                        <div class="gender-inputs">
                            <div class="gender-title">
                                <h6>Gêneros</h6>
                            </div>
        
                            <div class="gender-group">
                               <div class="gender-input">
                                    <input type="radio" id="femala" name="gender">
                                    <label for="female">Feminino</label>
                               </div> 
        
                               <div class="gender-input">
                                    <input type="radio" id="mela" name="gender">
                                     <label for="male">Masculino</label>
                               </div> 
        
                                <div class="gender-input">
                                    <input type="radio" id="others" name="gender">
                                    <label for="others">Outros</label>
                               </div> 
        
                               <div class="gender-input">
                                    <input type="radio" id="nome" name="gender">
                                    <label for="none">Prefiro não dizer</label>
                                </div>

                            </div>

                                <div class="continue-botao">
                                    <button><a><input type="submit" name="submit" value="Enviar"></a></button>
                                </div>
                        </div>
        
                    </form>
                </div>
            </div>
        </aside>
    </main>
    <script src="./cadastro/Scrypt/script.js"></script>
</body>
</html>