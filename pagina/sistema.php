<?php 
    session_start();
    include 'C:\wamp64\www\banco\conf\config.php';
    //print_r($_SESSION);
    if((!isset($_SESSION['MAT']) == true) and (!isset($_SESSION['nome']) == true)){

        unset($_SESSION['MAT']);
        unset($_SESSION['nome']);

        header('location: login.php');
    }
        $logado = $_SESSION['nome'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    echo"<h1>Bem vindo</h1>".$logado;

    ?>
</body>
</html>