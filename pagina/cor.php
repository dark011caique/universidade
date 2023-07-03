<?php 
    session_start();
    include 'C:\wamp64\www\banco\conf\config.php';

    include'nav.php';
    
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

    <h1>Alterar Cor de Fundo</h1>
    <form action="salvar_cor.php" method="POST">
        <label for="cor">Cor de Fundo:</label>
        <input type="color" id="cor" name="cor" required>
        <br><br>
        <input type="submit" value="Salvar">
    <?php
    
    

    ?>
</body>
</html>