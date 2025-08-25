<?php
include 'conexao.php'; // Importa o arquivo que conecta ao banco
session_start(); // Inicia a sessão para usar variáveis salvas


$cpf = $_SESSION["cpf"]; // Pega o CPF salvo na sessão
 
// Define o fuso horário para o horário de São Paulo
date_default_timezone_set('America/Sao_Paulo');

// Pega a data e hora atual no formato: dia/mês/ano hora:minuto:segundo
$emissao = date('d/m/Y H:i:s');

// Conectar ao banco de dados
try { //→ Tentar fazer algo que pode dar erro
     // Cria a conexão com o banco de dados (host, porta, banco, usuário, senha)
    $pdo = new PDO("mysql:host=localhost;port=3406;dbname=lojaze", "root", "");
    
      // Ativa os erros do banco para serem mostrados, se acontecerem
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepara o comando SQL para buscar nome e CPF do cliente com base no CPF da sessão
    $stmt = $pdo->prepare("SELECT nome, cpf FROM cadastro WHERE cpf = $cpf");
    
    // Executa o comando acima
    $stmt->execute();

     // Pega os dados da consulta como array associativo
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se não achou o cliente, exibe mensagem e para tudo
    if (!$cliente) {
        die("Cliente não encontrado.");
    }

     // Gera um código aleatório para a nota fiscal (ex: NF-123456)
    $codigoNota = "NF-" . rand(100000, 999999); // Gerar código da nota
} catch (PDOException $e) {
    // Se der erro na conexão, mostra o erro e encerra
    die("Erro de conexão: " . $e->getMessage());
}

 
?>




<!DOCTYPE html>

<html lang="pt-BR">
    
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nota Fiscal - Loja do Seu Zé</title>

    <link rel="icon" href="imagens/logo.png" type="image/png">

    <style>

        body {

            font-family: 'Arial', sans-serif;

            background: #f7f7f7;

            margin: 0;

            padding: 0;

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

        }

        .nota-fiscal-container {

            background-color: #fff;

            padding: 30px;

            border-radius: 12px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);

            width: 80%;

            max-width: 800px;

            text-align: left;

            font-size: 14px;

        }

        .cabecalho {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;

            padding-bottom: 10px;

            position: relative;
            
            border-bottom: 2px solid #4e73df;

        }

        .bottom {

            display: flex;

            align-items: center;

            margin-bottom: 20px;
            
            padding-bottom: 10px;

            border-bottom: 2px solid #4e73df;

        }

        .logo {

            width: 80px;

            height: 80px;

            position: relative;

            left: 70%;
            
        }

        .nome-loja {

            position: absolute;

            left: 50%;

            transform: translateX(-50%);

        }

        .nota-fiscal-container h2 {

            margin: 0;

            font-size: 22px;

            font-weight: bold;

            color: #333;

        }

        .nota-fiscal-container .info {

            margin-bottom: 20px;

        }

        .nota-fiscal-container .info p {

            margin: 5px 0;

        }

        .nota-fiscal-container .produtos-list {

            margin-top: 20px;

            border-top: 2px solid #f0f0f0;

            padding-top: 15px;

        }

        .nota-fiscal-container .produtos-list ul {

            list-style: none;

            padding: 0;

            margin: 0;

        }

        .nota-fiscal-container .produtos-list li {

            display: flex;

            justify-content: space-between;

            padding: 8px 0;

            border-bottom: 1px solid #f0f0f0;

        }

        .nota-fiscal-container .produtos-list li span {

            font-size: 14px;

        }

        .total {

            font-size: 18px;

            font-weight: bold;

            margin-top: 10px;

        }

        .btn-back {

            display: inline-block;

            margin-top: 30px;

            padding: 10px 20px;

            background-color: #4e73df;

            color: white;

            font-size: 16px;

            border: none;

            border-radius: 5px;

            cursor: pointer;

            text-decoration: none;

        }

        .btn-back:hover {

            background-color: #2e59d9;

        }

        .nota-fiscal-container .rodape {

            margin-top: 30px;

            border-top: 2px solid #f0f0f0;

            padding-top: 10px;

            text-align: center;

            font-size: 12px;

            color: #888;

        }

        .qr_code{

            position: relative;
            left: 1px;
            width: 170px;
            height: 170px;

        }

        .qr_code img {

            width: 100%;

            height: 100%;

        }

    </style>

</head>

<body>

    <div class="nota-fiscal-container" id="notaFiscalContainer">

        <div class="cabecalho">

            <h2 class="nome-loja">Nota Fiscal - Loja do Seu Zé</h2>

            <img src="imagens/logo.png" class="logo" alt="Logo">

        </div>
    

        <div class="info">

            <p><strong>CNPJ:</strong> 12.345.678/0001-95</p>

            <p><strong>Código:</strong> <?=$codigoNota?></p>

            <p><strong>Emissão:</strong> <?=$emissao?></p>
            
            <p><strong>Cliente:</strong> <?= htmlspecialchars($cliente['nome']) ?></span></p>
            
            <p><strong>CPF:</strong> <?= htmlspecialchars($cliente['cpf']) ?></span></p>
            
            <p><strong>Forma de Pagamento:</strong> <span id="formaPagamento"></span></p>
            


        </div>

        <div class="qr_code">

            <img src="imagens/qr_code.jpeg">

        </div>
        
        <div class="produtos-list">

            <p><strong>Produtos:</strong></p>

            <ul id="produtosList"></ul>

            <p class="total"><strong>Total:</strong> R$ <span id="totalPrice"></span></p>

        </div>

        <button class="btn-back" onclick="window.location.href = 'Loja_do_seu_Ze.html';">Voltar para a loja</button>

        <div class="rodape">

            <p>Obrigado pela compra! A Loja do Seu Zé agradece sua preferência.</p>

        </div>

    </div>

    <script>


        const notaFiscalData = JSON.parse(localStorage.getItem('notaFiscal'));

        const carrinhoItens = JSON.parse(localStorage.getItem('carrinho')) || [];
    
        console.log("Nota Fiscal Data:", notaFiscalData);

        console.log("Carrinho Itens:", carrinhoItens);


    
        if (notaFiscalData && carrinhoItens.length > 0) {

            
            const formaPagamento = document.getElementById('formaPagamento');
            
            const produtosList = document.getElementById('produtosList');

            const totalPrice = document.getElementById('totalPrice');
    

            formaPagamento.textContent = notaFiscalData.formaPagamento;
    
            let total = 0;

            const produtosHtml = carrinhoItens.map(item => {

                total += item.price * item.quantity;

                return `

                    <li>

                        <span>${item.name} (${item.quantity}x)</span>

                        <span>R$ ${(item.price * item.quantity).toFixed(2)}</span>

                    </li>`;

            }).join('');
    
            produtosList.innerHTML = produtosHtml;

            totalPrice.textContent = total.toFixed(2);

        } else {

            alert("Carrinho vazio ou dados incompletos. Redirecionando...");

            window.location.href = "Loja_do_seu_Ze.html";

        }

    </script>

</body>

</html>