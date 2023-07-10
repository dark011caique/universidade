<?php

session_start();

include 'C:\wamp64\www\banco\conf\config.php';

$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

if (isset($_POST['submit'])) {
    
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];

    $resul = mysqli_query($conexao, "INSERT INTO `alunos`(`nome`, `endereco`, `cidade`, `cor_fundo`) VALUES ('$nome','$endereco','$cidade','')");

    if ($resul) {
        echo "Cadastrado com sucesso";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
    
    header('location: login.php');
}

?>

