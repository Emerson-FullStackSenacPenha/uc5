<?php

// Lincar com as funções
require_once "src/usuario.php";

// Função de editar usuario
$id = $_GET['id'];

$usuario = buscarUsuarioPorId($conexao, $id);

if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])){

    $nome = $_POST['nome'];
    $senha_atual = $_POST['senha_atual'];
    $senha_nova = $_POST['senha_nova'] ?? null;
    
    if(!password_verify($senha_atual, $usuario['senha'])){

        echo "<p>Senha não confere, <a href='recuperar.php'>recupere a senha</a></p>";

    } else {

        atualizarUsuario($conexao, $nome, $id, $senha_nova);
        header("location:index.php");
        exit;

    }

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
    
    <h2>Editar usuario</h2>

    <form action="" method="post">

        <input type="hidden" name="id" value="<?=$usuario['id']?>">

        <div>
            <label for="nome">Usuario:</label>
            <input  value="<?=$usuario['nome']?>" type="text" name="nome" id="nome" required>
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha_nova" id="senha_nova" pattern="\d{4}" maxlength="4" placeholder="Nova senha (opcional)">
        </div>
        
        <br>
        <hr>

        <p>Digite sua senha para atualizar o cadastro</p>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha_atual" id="senha_atual" pattern="\d{4}" maxlength="4" placeholder="Senha atual" required>
        </div>

        <button type="submit" name="atualizar">Atualizar</button>
        <button><a href="index.php">Voltar</a></button>

    </form>
 
</body>
</html>