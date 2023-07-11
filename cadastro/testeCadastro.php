<?php

session_start();

include 'C:\wamp64\www\banco\conf\config.php';

$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

if (mysqli_connect_errno()) {
    echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
    exit;
    }

if (isset($_POST['submit'])) {
    
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $sexo = $_POST['gender'];

    $resul = mysqli_query($conexao, "INSERT INTO `alunos`(`nome`, `endereco`, `cidade`, `cor_fundo` , `foto`, `sexo`) VALUES ('$nome','$endereco','$cidade','','', '$sexo')");

    if ($resul) {
        $matricula = mysqli_insert_id($conexao);
        echo "<script>alert('Número da matrícula: $matricula'); window.location.href = 'login.php';</script>";
        // Redirecionar para a página de login
        echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 3000);</script>";
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
    
     header('location: login.php');
}

?>

