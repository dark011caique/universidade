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


echo"<strong>PROFESSORES</strong><br><br>";

// Consulta SQL para selecionar todos os alunos
$consulta = "SELECT * FROM professores";

// Execute a consulta
$resultado = mysqli_query($conexao, $consulta);

// Verifique se a consulta retornou algum resultado
if (mysqli_num_rows($resultado) > 0) {
    // Exiba os dados de cada aluno
    while ($prof = mysqli_fetch_assoc($resultado)) {
        echo "COD_PROF: " . $prof['COD_PROF'] . "<br>";
        echo "Nome: " . $prof['nome'] . "<br>";
        echo "Endereço: " . $prof['endereco'] . "<br>";
        echo "Cidade: " . $prof['cidade'] . "<br><br>";
    }
} else {
    echo "Nenhum aluno encontrado.";
}
?>