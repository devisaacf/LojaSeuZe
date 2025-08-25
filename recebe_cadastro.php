

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RecebeDados</title>
    </head>
    <body>
        
<?php
include 'conexao.php'; // conecta ao banco

// CHEGAR CONEXÃO
if(!$conexao){
    echo "NÃO CONECTADO";
}
echo "CONECTADO AO BANCO";

// RECUPERAR E VERIFICAR SE JÁ EXISTE
$cpf = $_POST['cpf'];
$cpf = mysqli_real_escape_string($conexao, $cpf);


// Pegar todos os dados do formulário corretamente
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$genero = mysqli_real_escape_string($conexao, $_POST['genero']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$numero_cartao = mysqli_real_escape_string($conexao, $_POST['numero_cartao']);
$codigo_cartao = mysqli_real_escape_string($conexao, $_POST['codigo_cartao']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);



// Verificar CPF ou email duplicados
$sql = "SELECT cpf, email, nome FROM cadastro WHERE cpf='$cpf' OR email='$email'";
$retorno = mysqli_query($conexao, $sql);

// mysqli_real_escape_string = Deixa a string com o formato certo para enviar para o banco de dados
if (mysqli_num_rows($retorno) > 0) {
    $row = mysqli_fetch_assoc($retorno);
    $nome_existente = $row['nome'];

    if ($row['cpf'] == $cpf) {
        echo "<script>
            alert('$nome_existente! CPF já cadastrado, faça o login!');
            window.location.href = 'login.html';
        </script>";
    } elseif ($row['email'] == $email) {
        echo "<script>
            alert('$nome_existente! E-mail já cadastrado, tente outro ou faça login!');
            window.location.href = 'login.html';
        </script>";
    }
    
}else{

    
    $sql = "INSERT INTO cadastro(nome, cpf, email, genero, cep, numero, telefone, numero_cartao, codigo_cartao, senha) values ('$nome', '$cpf', '$email', '$genero', '$cep', '$numero', '$telefone', '$numero_cartao', '$codigo_cartao', '$senha')";
    
    $resultado = mysqli_query($conexao, $sql);
    echo "<script>
    alert('Bem-vindo(a), $nome! Usuário cadastrado com sucesso!');
    window.location.href = 'Loja_do_seu_Ze.html';
    
    </script>";

}
?>

</body>
</html>