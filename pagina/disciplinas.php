<?php
session_start();

include 'C:\wamp64\www\banco\conf\config.php';

include'nav.php';
// Estabeleça a conexão com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'universidade');


// Verifique se a conexão foi estabelecida com sucesso
if (!$conexao) {
    die("Erro ao conectar-se ao banco de dados: " . mysqli_connect_error());
}

$con3 = "SELECT * FROM disciplinas";
$res3 = mysqli_query($conexao, $con3);

if(mysqli_num_rows($res3) > 0){

    while($dis = mysqli_fetch_assoc($res3)){
        echo "COD_DISC: ". $dis['COD_DISC']. "<br>";
        echo "Nome_disc: ". $dis['nome_disc']. "<br>";
        echo "Carga_hor: ". $dis['carga_hor']. "<br><br>";
    }
}
else{
    echo"Nemnhuma discplina encontrada ";
}

?>