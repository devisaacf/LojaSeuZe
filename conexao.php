<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'lojaze';
$porta = 3406;

$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>
