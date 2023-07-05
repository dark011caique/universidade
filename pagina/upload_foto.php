<?php
session_start();

if (!isset($_SESSION['MAT'])) {
    // Usuário não autenticado, redirecionar para a página de login ou exibir uma mensagem de erro
}

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $targetDir = '../img/'; // Especifique o diretório onde as imagens serão armazenadas
    $targetFile = $targetDir . basename($_FILES['foto']['name']);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar se o arquivo é uma imagem válida
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if ($check === false) {
        echo "O arquivo enviado não é uma imagem válida.";
        $uploadOk = false;
    }

    // Verificar se o arquivo já existe
    if (file_exists($targetFile)) {
              // Excluir o arquivo existente
              if (!unlink($targetFile)) {
                echo "Erro ao excluir o arquivo existente.";
                $uploadOk = false;
            }
    }
    

    // Limitar o tamanho do arquivo
    if ($_FILES['foto']['size'] > 500000) {
        echo "O arquivo é muito grande. O tamanho máximo permitido é de 500KB.";
        $uploadOk = false;
    }

    // Limitar o tipo de arquivo
    if ($imageFileType !== 'jpg' && $imageFileType !== 'jpeg' && $imageFileType !== 'png' && $imageFileType !== 'gif') {
        echo "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = false;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
            // Atualizar o banco de dados com o novo caminho da foto
            $conexao = mysqli_connect('localhost', 'root', '', 'universidade');
            $matricula = $_SESSION['MAT'];
            $foto = '../img/' . basename($_FILES['foto']['name']);
            $sql = "UPDATE alunos SET foto = '$foto' WHERE MAT = '$matricula'";
            mysqli_query($conexao, $sql);
            mysqli_close($conexao);

            // Redirecionar para a página atual
            header("Location: perfil.php ");
            exit();
        } else {
            echo "Ocorreu um erro ao fazer o upload do arquivo.";
        }
    }
}
?>
