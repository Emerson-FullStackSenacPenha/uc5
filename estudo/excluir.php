<?php

require_once "src/usuario.php";

$id = $_GET['id'];
excluirUsuario($conexao, $id);
header("location:index.php");
exit;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo de PHP com Banco SQL</title>
</head>
<body>
    
    <h1>Testando PHP com Banco SQL</h1>
    
    <h2>Excluir usuario</h2>
    
    
 
</body>
</html>