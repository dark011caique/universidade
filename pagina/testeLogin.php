<?php

    session_start();

    if(isset($_POST['submit']) &&!empty($_POST['MAT']) &&!empty($_POST['nome']))
    {
        include 'C:\wamp64\www\banco\conf\config.php';

        $conexao = mysqli_connect('localhost','root','','universidade');

        // Verificar se a conexão foi estabelecida corretamente
        if (mysqli_connect_errno()) {
        echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
        exit;
        }

        $MAT = $_POST['MAT'];
        $nome = $_POST['nome'];

        $sql = "SELECT * FROM alunos WHERE MAT = '$MAT' and nome = '$nome' ";

        $result = mysqli_query($conexao, $sql);

        print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['MAT']);
            unset($_SESSION['nome']);

            echo"erro ao achar usuario1";

            //header('location: login.php');
        }
        else
        {
            $_SESSION['MAT'] = $MAT;
            $_SESSION['nome'] = $nome;

            header('location: perfil.php');
        }

    }else{
        //header('location: login.php');
        echo"erro ao achar usuario";
    }

?>