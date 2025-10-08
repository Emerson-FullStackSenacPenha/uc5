<?php

// Lincar com as funções
require_once "src/usuario.php";

// Função de recuperar senha

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])){

    $email = $_POST['email'] ?? '';
    $nova_senha = $_POST['nova_senha'] ?? '';

    $usuario = buscarUsuarioPorEmail($conexao, $email);

    if($usuario){

        atualizarUsuario($conexao, null, $usuario['id'], $nova_senha);
        header("location: index.php");

    }else{

        echo "<script>alert('E-mail não encontrado');</script>";

    }

}

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
    
    <h2>Recuperar Senha</h2>

    <form action="" method="post">

        <div>
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
        </div>

        <div>
            <input type="password" name="nova_senha" placeholder="Atualizar senha" required>
        </div>

        <button type="submit" name="atualizar">Atualizar</button>

        <button > <a href="index.php">Sair</a> </button>

    </form>
 
</body>
</html>