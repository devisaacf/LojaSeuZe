<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecebeDados</title>
</head>
<body>

<?php
include 'conexao.php'; // Inclui o arquivo que conecta ao banco
session_start(); // Inicia a sessão para guardar dados do usuário

// Verifica se a conexão com o banco foi feita
if (!$conexao) {
    die("NÃO CONECTADO AO BANCO"); // Encerra se não conectou
}
echo "CONECTADO AO BANCO<br>"; // Mostra que conectou

// Protege os dados que vieram do formulário (evita invasões SQL)
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$_SESSION["cpf"] = $cpf; // Salva o CPF na sessão para usar depois

// Cria a consulta SQL para procurar o nome com CPF e senha certos
$sql = "SELECT nome FROM cadastro WHERE cpf='$cpf' AND senha='$senha'";
$resultado = mysqli_query($conexao, $sql); // Executa a consulta

// Se der erro na consulta
if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Se achou alguém com o CPF e senha certos
if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado); // Pega o resultado
    $nome = $linha['nome']; // 🧍 Pega o nome do usuário

    // Redireciona para a loja com mensagem de boas-vindas
    echo "<script>
        window.location.href = 'Loja_do_seu_Ze.html';
        alert('Bem-vindo(a), $nome! Login realizado com sucesso.');
    </script>";
} else {
    // Se CPF ou senha estiverem errados, volta para o login
    echo "<script>
        alert('CPF ou Senha inválidos, tente novamente ou faça o cadastro');
        window.location.href = 'login.html';
    </script>";
}
?>


</body>
</html>
