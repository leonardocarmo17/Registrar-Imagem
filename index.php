<?php 
include("conexao.php");


$error = '';
if(isset($_FILES['arquivo'])){
    $arquivo = $_FILES['arquivo'];
    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    $novoNomeDoArquivo = uniqid() . '.' . $extensao;
    $path = $pasta . $novoNomeDoArquivo;

    // Verifica o tamanho do arquivo
    if ($arquivo['size'] > 2000000) { // 2MB
        $error = 'Arquivo muito grande, máximo de 2MB.';
    } 
    // Verifica a extensão do arquivo
    elseif (!in_array($extensao, ['jpg', 'png'])) {
        $error = 'Tipo de arquivo não aceito.';
    } 
    // Move o arquivo para a pasta de upload
    elseif (!move_uploaded_file($arquivo['tmp_name'], $path)) {
        $error = 'Falha ao mover arquivo para a pasta de upload.';
    } 
    // Se não houver erros, insere o registro no banco
    if ($error === ''){
        $deu_certo = $mysqli->query("INSERT INTO arquivos (nome, path) VALUES ('$nomeDoArquivo', '$path')");
        if(!$deu_certo){
            $error = "Falha ao enviar o arquivo: " . $mysqli->error;
        }
    }
}

// Consulta os arquivos
$sql_arquivos = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <p><label for="">Seleciona o arquivo</label>
        <input name="arquivo" type="file"></p>
        <button name="upload" type="submit">Enviar arquivo</button>
    </form>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Preview</th>
                <th>Arquivo</th>
                <th>Data de Envio</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($arquivo = $sql_arquivos->fetch_assoc()){
                    $dataUpload = new DateTime($arquivo['data_upload'], new DateTimeZone('UTC'));
                    $dataUpload->modify('+4 hours');
                    $data_upload = $dataUpload->format('d/m/Y H:i');
            ?>
            <tr>
                <td><img height="50" src="<?php echo htmlspecialchars($arquivo['path']); ?>" alt="Preview"></td>
                <td><a target="_blank" href="<?php echo htmlspecialchars($arquivo['path']); ?>"><?php echo htmlspecialchars($arquivo['nome']); ?></a></td>
                <td><?php echo htmlspecialchars($data_upload); ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>
