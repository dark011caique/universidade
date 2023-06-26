<?php

$conexao = mysqli_connect('localhost','root','','universidade');

if($conexao){
    echo "conexão bem-sucedida";
}else{
    echo "erro ao conectar ao banco de dados: " . mysqli_connect_errno();
}

if($conexao){
     // Consulta para criar a tabela
    $consultaAlunos = "CREATE TABLE alunos (
        MAT INT PRIMARY KEY,
        nome VARCHAR(100),
        endereco VARCHAR(100),
        cidade VARCHAR(50)
    ) ENGINE=InnoDB";

     // Executa a consulta para criar a tabela
    $resultadoAlunos = mysqli_query($conexao, $consultaAlunos);
     // Verifica se a tabela "usuarios" foi criada com sucesso
    if ($resultadoAlunos){
        echo "Tabela alunos criada com sucesso <br>";
    }
    else{
        echo "Erro ao conectar ao banco de dados: " .  mysqli_connect_errno();
    }

    $consultaDisciplinas = "CREATE TABLE disciplinas (
        COD_DISC VARCHAR(5) PRIMARY KEY,
        nome_disc VARCHAR(100),
        carga_hor INT
    ) ENGINE=InnoDB";

    $resultadoDisciplina = mysqli_query($conexao, $consultaDisciplinas);

    if($resultadoAlunos){
        echo"Tabela Disciplina criada <br> ";
    }
    else{
        echo "Erro ao conctar ao banco de dados: " . mysqli_connect_errno();
    }


    $consultaProfessores = "CREATE TABLE professores(
        COD_PROF INT PRIMARY KEY,
        nome VARCHAR(50),
        endereco VARCHAR(50),
        cidade VARCHAR(50)
    )";

    $resultadoProfessores = mysqli_query($conexao, $consultaProfessores);


    if($resultadoProfessores){
        echo "Tabela professor criada <br>";
    }
    else{
        echo "Erro ao conctar ao banco de dados: " . mysqli_connect_errno();
    }

    $consultaTurma = "CREATE TABLE turma (
        COD_DISC INT,
        COD_TURMA INT,
        COD_PROF INT,
        ANO VARCHAR(50),
        horario VARCHAR(50),
        PRIMARY KEY (COD_DISC, COD_TURMA, COD_PROF, ANO),
        FOREIGN KEY (COD_DISC) REFERENCES disciplinas (COD_DISC),
        FOREIGN KEY (COD_PROF) REFERENCES professores (COD_PROF)
    )";


     $resultadoTurma = mysqli_query($conexao, $consultaTurma);

    if($resultadoTurma){
        echo "Tabela Turma criada ".'<br>';
    }
    else{
        echo "Erro ao conctar ao banco de dados: " . mysqli_connect_errno();
    }
    

    $consultaHistorico = "CREATE TABLE historico (
        MAT VARCHAR(5),
        COD_DISC VARCHAR(5),
        COD_TURMA VARCHAR(5),
        COD_PROF VARCHAR(5),
        ANO VARCHAR(50R,
        frequencia FLOAT,
        nota FLOAT,
        PRIMARY KEY (MAT, COD_DISC, COD_TURMA, COD_PROF, ANO),
        FOREIGN KEY (MAT) REFERENCES alunos (MAT),
        FOREIGN KEY (MAT, COD_DISC, COD_TURMA, COD_PROF, ANO) REFERENCES turma(MAT, COD_DISC, COD_TURMA, COD_PROF, ANO)
    )";


    $resultadoHistorico = mysqli_query($conexao, $consultaHistorico);

    if($resultadoHistorico){
        echo"Tabela Historico criada <br>";
    }
    else{
        echo "Erro ao conctar ao banco de dados: " . mysqli_connect_errno();
    }
    //INSERT COMEÇA AQUI 
    //=========================================================================================
    // Código para inserir os dados no histórico
    $insertHistorico = "INSERT INTO Historico (MAT, COD_DISC, COD_TURMA, COD_PROF, ANO, frequencia, nota)
                        SELECT A.MAT, D.COD_DISC, T.COD_TURMA, T.COD_PROF, T.ANO, ROUND(RAND() * 100, 2) AS frequencia, ROUND(RAND() * 10, 2) AS nota
                        FROM Alunos A, Disciplinas D, Turma T
                        WHERE T.COD_DISC = D.COD_DISC";

    $resultadoInsert = mysqli_query($conexao, $insertHistorico);

    

if ($resultadoInsert) {
        echo "Dados inseridos na tabela Historico com sucesso<br>";
    } else {
        echo "Erro ao inserir dados na tabela Historico: " . mysqli_error($conexao) . "<br>";
    }
    //==================================================================================================================================================
    // Inserir dados na tabela Alunos
    $insertAluno1 = "INSERT INTO alunos (MAT, nome, endereco, cidade) VALUES (2015010101, 'JOSE DE ALENCAR', 'RUA DAS ALMAS', 'NATAL')";
    $resultadoInsert1 = mysqli_query($conexao, $insertAluno1);

    $insertAluno2 = "INSERT INTO alunos (MAT, nome, endereco, cidade) VALUES (2015010102, 'JOÃO JOSÉ', 'AVENIDA RUY CARNEIRO', 'JOÃO PESSOA')";
    $resultadoInsert2 = mysqli_query($conexao, $insertAluno2);

    $insertAluno3 = "INSERT INTO alunos (MAT, nome, endereco, cidade) VALUES (2015010103, 'MARIA JOAQUINA', 'RUA CARROSSEL', 'RECIFE')";
    $resultadoInsert3 = mysqli_query($conexao, $insertAluno3);

    $insertAluno4 = "INSERT INTO alunos (MAT, nome, endereco, cidade) VALUES (2015010104, 'MARIA DAS DORES', 'RUA DAS LADEIRAS', 'FORTALEZA')";
    $resultadoInsert4 = mysqli_query($conexao, $insertAluno4);

    $insertAluno5 = "INSERT INTO alunos (MAT, nome, endereco, cidade) VALUES (2015010105, 'JOSUÉ CLAUDINO DOS SANTOS', 'CENTRO', 'NATAL')";
    $resultadoInsert5 = mysqli_query($conexao, $insertAluno5);

    $insertAluno6 = "INSERT INTO alunos (MAT, nome, endereco, cidade) VALUES (2015010106, 'JOSUÉLISSON CLAUDINO DOS SANTOS', 'CENTRO', 'NATAL')";
    $resultadoInsert6 = mysqli_query($conexao, $insertAluno6);

    // Verificar se os dados foram inseridos com sucesso
    if ($resultadoInsert1 && $resultadoInsert2 && $resultadoInsert3 && $resultadoInsert4 && $resultadoInsert5 && $insertAluno6) {
        echo "Dados inseridos na tabela Alunos com sucesso<br>";
    } else {
        echo "Erro ao inserir dados na tabela Alunos: " . mysqli_error($conexao) . "<br>";
    }
    //=====================================================================================================================================================
    // Inserir dados na tabela Disciplinas
    $insertDis1 = "INSERT INTO disciplina (COD_DISC, nome_disc, carga_hor) VALUES ('BD', 'BANCO DE DADOS', 100)";
    $resultadoDis1 = mysqli_query($conexao, $insertDis1);

    $insertDis2 = "INSERT INTO disciplina (COD_DISC, nome_disc, carga_hor) VALUES ('POO', 'PROGRAMAÇÃO COM ACESSO A BANCO DE DADOS', 100)";
    $resultadoDis2 = mysqli_query($conexao, $insertDis2);

    $insertDis3 = "INSERT INTO disciplina (COD_DISC, nome_disc, carga_hor) VALUES ('WEB', 'AUTORIA WEB', 50)";
    $resultadoDis3 = mysqli_query($conexao, $insertDis3);

    $insertDis4 = "INSERT INTO disciplina (COD_DISC, nome_disc, carga_hor) VALUES ('ENG', 'ENGENHARIA DE SOFTWARE', 80)";
    $resultadoDis4 = mysqli_query($conexao, $insertDis4);

    if ($insertDis1 && $insertDis2 && $insertDis3 && $insertDis4) {
        echo "Dados inseridos na tabela Alunos com sucesso<br>";
    } else {
        echo "Erro ao inserir dados na tabela Alunos: " . mysqli_error($conexao) . "<br>";
    }
    //========================================================================================================================================================
    // Inserir dados na tabela Professores

    $insertProf1 = "INSERT INTO professores (COD_PROF, nome, endereco, cidade) VALUES (212131, 'NICKERSON FERREIRA', 'RUA MANAÍRA', 'JOÃO PESSOA')";
    $resultOProf1 = mysqli_query($conexao, $insertProf1);

    $insertProf2 = "INSERT INTO professores (COD_PROF, nome, endereco, cidade) VALUES (122135, 'ADORILSON BEZERRA', 'AVENIDA SALGADO FILHO', 'NATAL')";
    $resultOProf2 = mysqli_query($conexao, $insertProf2);

    $insertProf3 = "INSERT INTO professores (COD_PROF, nome, endereco, cidade) VALUES (192011, 'DIEGO OLIVEIRA', 'AVENIDA ROBERTO FREIRE', 'NATAL')";
    $resultOProf3 = mysqli_query($conexao, $insertProf3);

    if ($insertProf1 && $insertProf2 && $insertProf3) {
        echo "Dados inseridos na tabela Alunos com sucesso<br>";
    } else {
        echo "Erro ao inserir dados na tabela Alunos: " . mysqli_error($conexao) . "<br>";
    }
    //=============================================================================================================================================================

    // Inserir dados na tabela Turma 

    $insertTurma1 = "INSERT INTO turma (COD_DISC, COD_TURMA, COD_PROF, ANO, horario) VALUES ('BD', 1, 212131, 2015, '11H-12H')";
    $consulta1 = mysqli_query($conexao,$insertTurma1);

    $insertTurma2 = "INSERT INTO Turma (COD_DISC, COD_TURMA, COD_PROF, ANO, horario) VALUES ('BD', 2, 212131, 2015, '13H-14H')";
    $consulta2 = mysqli_query($conexao,$insertTurma2);

    $insertTurma3 = "INSERT INTO Turma (COD_DISC, COD_TURMA, COD_PROF, ANO, horario) VALUES ('POO', 1, 192011, 2015, '08H-09H')";
    $consulta3 = mysqli_query($conexao,$insertTurma3);

    $insertTurma4 = "INSERT INTO Turma (COD_DISC, COD_TURMA, COD_PROF, ANO, horario) VALUES ('WEB', 1, 192011, 2015, '07H-08H')";
    $consulta4 = mysqli_query($conexao,$insertTurma4);

    $insertTurma5 = "INSERT INTO Turma (COD_DISC, COD_TURMA, COD_PROF, ANO, horario) VALUES ('ENG', 1, 122135, 2015, '10H-11H')";
    $consulta5 = mysqli_query($conexao,$insertTurma5);

    if($insertTurma1 && $insertTurma2 && $insertTurma3 && $insertTurma4 && $insertTurma5){
        echo"Dados inseridos na tabela Alunos com sucesso<br>";
    }
    else{
        echo"erro ao tenata conctar ao banco de dados: ". mysqli_connect_errno($conexao);
    }


    mysqli_close($conexao);
} else {
    echo "Erro ao conectar-se ao banco de dados: " . mysqli_connect_error() ."<br>";
}




?>