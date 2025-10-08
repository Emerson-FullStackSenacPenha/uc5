<?php

// Lincar com as funções
require_once "src/usuario.php";

// Função de cadastrar usuario
if($_SERVER['REQUEST_METHOD'] === 'POST' ){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    inserirUsuario($conexao, $nome, $email, $senha);
    header("location:index.php");
    exit;

};

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
    <br>
    
    <h2>Cadastrar Usuario</h2>

    <form action="" method="post">

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Seu primeiro nome" required>
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Seu e-mail" required>
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" pattern="\d{4}" maxlength="4" placeholder="Senha de 4 números" required>
        </div>

        <button type="submit">Salvar</button>
        <button > <a href="index.php">Voltar</a> </button>

    </form>

</body>
</html>