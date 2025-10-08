<?php

$servidor = "localhost";
$banco = "estudo";
$usuario = "root";
$senha = '';

try {

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8",$usuario,$senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $erro){

    die("Erro ao conectar: ".$erro->getMessage());

}

?>