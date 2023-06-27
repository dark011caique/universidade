<?php
// Inclua o arquivo de configuração com as informações de conexão
include 'C:\wamp64\www\banco\conf\config.php';

// Estabeleça a conexão com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'universidade');

// Verifique se a conexão foi estabelecida com sucesso
if (!$conexao) {
    die("Erro ao conectar-se ao banco de dados: " . mysqli_connect_error());
}

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

$consulta1 = "SELECT * FROM professores";

$resultado1 = mysqli_query($conexao, $consulta);

echo "================================================================================================<br>";
echo"<strong>PROFESSORES</strong><br><br>";

if(mysqli_num_rows($resultado1)>0){
    while($prof = mysqli_fetch_assoc($resultado1)){
        echo "Nome". $prof['nome']. "<br>";
        echo "Endereço". $prof['endereco']. "<br>";
        echo "Cidade". $prof['cidade']. "<br><br>"; 
    }
}
else{
    echo"Nenhum professor encontrado ";
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
?>