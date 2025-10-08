<?php

require_once "C:/xampp/htdocs/estudo/conecta.php";

/* 
Comandos para exibir na tela as informações do array ou objeto, se fosse variavel simples seria echo ou print

Mostra apenas os resultados de forma simples
print_r(buscarUsuario($conexao));

Mostra a quantidade, tamanho, valor e o tipo da variavel
var_dump(buscarUsuario($conexao));
*/

// Função de visualizar usuarios
function buscarUsuario($conexao){

    $sql = "SELECT * FROM usuario ORDER BY nome";
    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();

}

// Função de cadastrar usuarios
function inserirUsuario($conexao, $nome, $email, $senha){

    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES(:nome, :email, :senha)";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":nome", $nome);
    $consulta->bindValue(":email", $email);
    $consulta->bindValue(":senha", $hashSenha);
    $consulta->execute();

}

// Função de receber id de usuarios
function buscarUsuarioPorId($conexao, $id){

    $sql = "SELECT * FROM usuario WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    return $consulta->fetch();

}

// Função de editar usuarios atráves do id recebido
function atualizarUsuario($conexao, $nome, $id, $senha = null){

    if(!empty($senha)){

        $sql = "UPDATE usuario SET nome = :nome, senha = :senha WHERE id = :id";
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":senha", password_hash($senha, PASSWORD_DEFAULT));

    }else{

        $sql = "UPDATE usuario SET nome = :nome WHERE id = :id";
        $consulta = $conexao->prepare($sql);

    }

    $consulta->bindValue(":nome", $nome);
    $consulta->bindValue(":id", $id);
    $consulta->execute();

}

// Função de recebr e-mail de usuarios
function buscarUsuarioPorEmail($conexao, $email){

    $sql = "SELECT * FROM usuario WHERE email = :email";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':email', $email);
    $consulta->execute();
    return $consulta->fetch(PDO::FETCH_ASSOC);

}

// Função de excluir usuarios
function excluirUsuario($conexao, $id){

    $sql = "DELETE FROM  usuario WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":id", $id);
    $consulta->execute();

}

/*
Usando foreach para visualizar nome e id dentro do bd

$usuarios = buscarUsuario($conexao);

foreach ($usuarios as $usuario) {
    echo $usuario['nome']."<br>";
    echo $usuario['id']."<br>";
}
*/

?>