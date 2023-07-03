<?php

session_start();

// Inclua o arquivo de configuração com as informações de conexão
include 'C:\wamp64\www\banco\conf\config.php';

include'nav.php';

// Estabeleça a conexão com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

// Verifique se a conexão foi estabelecida com sucesso
if (!$conexao) {
    die("Erro ao conectar-se ao banco de dados: " . mysqli_connect_error());
}

echo"<br>";
echo"<strong>ALUNOS</strong><br><br>";

// Consulta SQL para selecionar todos os alunos
$consulta = "SELECT * FROM alunos";

// Execute a consulta
$resultado = mysqli_query($conexao, $consulta);

// Verifique se a consulta retornou algum resultado
if (mysqli_num_rows($resultado) > 0) {
    // Exiba os dados de cada aluno
    while ($aluno = mysqli_fetch_assoc($resultado)) {
        echo "MAT: " . $aluno['MAT'] . "<br>";
        echo "Nome: " . $aluno['nome'] . "<br>";
        echo "Endereço: " . $aluno['endereco'] . "<br>";
        echo "Cidade: " . $aluno['cidade'] . "<br><br>";
    }
} else {
    echo "Nenhum aluno encontrado.";
}

/*echo "================================================================================================<br>";
echo"<strong>PROFESSORES</strong><br><br>";

$consulta1 = "SELECT * FROM professores";

$resultado1 = mysqli_query($conexao, $consulta);



if(mysqli_num_rows($resultado1)>0){
    while($prof = mysqli_fetch_assoc($resultado1)){
        echo "Nome: ". $prof['nome']. "<br>";
        echo "Endereço: ". $prof['endereco']. "<br>";
        echo "Cidade: ". $prof['cidade']. "<br><br>"; 
    }
}
else{
    echo"Nenhum professor encontrado ";
}

echo "================================================================================================<br>";
echo"<strong>DISCIPLINAS</strong><br><br>";

$con3 = "SELECT * FROM disciplinas";
$res3 = mysqli_query($conexao, $con3);

if(mysqli_num_rows($res3) > 0){
    while($dis = mysqlI_fetch_assoc($res3)){
        echo "COD_DISC: ". $dis['COD_DISC']. "<br>";
        echo "Nome_disc: ". $dis['nome_disc']. "<br>";
        echo "Carga_hor: ". $dis['carga_hor']. "<br><br>";
    }
}
else{
    echo"Nemnhuma discplina encontrada ";
}
*/

// Feche a conexão com o banco de dados
mysqli_close($conexao);
?>