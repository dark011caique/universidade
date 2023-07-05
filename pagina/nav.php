<?php
include 'C:\wamp64\www\banco\conf\config.php';

if (!isset($_SESSION['MAT'])) {
    // Usuário não autenticado, redirecionar para a página de login ou exibir uma mensagem de erro
}

// Conectar ao banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

// Verificar se a conexão foi estabelecida com sucesso
if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit;
}

// Consulta SQL para obter a cor de fundo e a foto do usuário
$matricula = $_SESSION['MAT'];
$sql = "SELECT cor_fundo, foto FROM alunos WHERE MAT = '$matricula'";

// Executar a consulta
$resultado = mysqli_query($conexao, $sql);

// Verificar se a consulta retornou algum resultado
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obter o valor das colunas "cor_fundo" e "foto"
    $row = mysqli_fetch_assoc($resultado);
    $corFundo = $row['cor_fundo'];
    $foto = $row['foto'];

    // Atribuir a cor de fundo e a foto à variável de sessão
    $_SESSION['cor_fundo'] = $corFundo;
    $_SESSION['foto'] = $foto;
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);

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
        img{  
            display: flex;
            position:absolute;
            right: 0;
            width: 60px;
            height: 60px;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            margin-bottom: 20px;
            cursor: pointer; 
        }
        #avatar{
            float: right;
            align-items: center;
            margin-top: 1rem;
            border-radius: 50%;
        }
    </style>

</head>
<body>

<form action="upload_foto.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto" accept="image/*">
    <button type="submit">Enviar</button>
</form>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="d-flex" > 
            <a href="cor.php" class="btn btn-danger me-5">escolha sua cor de fundo</a>
            <a href="professores.php" class="btn btn-danger me-5">Meus professores</a>
            <a href="disciplinas.php" class="btn btn-danger me-5">Disciplina</a>
            <a href="" class="btn btn-danger me-5">Historico</a>
            <a href="alunos.php" class="btn btn-danger me-5">Alunos</a>
            <a href="" class="btn btn-danger me-5">Turma</a>
            <a href="perfil.php" class="btn btn-danger me-5">Perfil</a>
        </div>
        <img class="avatar-30 rounded" id="avatar" class="icon"  src="<?php echo $_SESSION['foto']; ?>">
    </nav>
</body>
</html>
