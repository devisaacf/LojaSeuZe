<?php 
include 'conexao.php'; // conecta ao banco
session_start();
$cpf = $_SESSION["cpf"];

?>



<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pagamento - Finalizar Compra</title>

    <link rel="stylesheet" href="styles.css">

    <link rel="icon" href="imagens/logo.png" type="image/png">

    <style>

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }

        body {

            font-family: 'Arial', sans-serif;

            background: linear-gradient(135deg, #4e73df, #1cc88a);

            height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

        }

        .container {

            display: flex;

            justify-content: center;

            align-items: center;

            width: 100%;

            height: 100%;

        }

        .form-container {

            background-color: #fff;

            padding: 40px;

            border-radius: 12px;

            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);

            width: 100%;

            max-width: 600px;

            text-align: center;

        }

        h1 {

            font-size: 36px;

            margin-bottom: 20px;

            color: #333;

            font-weight: 600;

            text-transform: uppercase;

        }

        .payment-option {

            background-color: #fff;

            padding: 20px;

            border-radius: 10px;

            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);

            cursor: pointer;

            transition: transform 0.3s ease, box-shadow 0.3s ease;

            margin-bottom: 20px;

        }

        .payment-option:hover {

            transform: scale(1.05);

            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);

        }

        .payment-option img {

            width: 100px;

            height: auto;

            margin-bottom: 15px;

        }

        .payment-option p {

            font-size: 18px;

            font-weight: bold;

            color: #333;

        }

        .selected {

            border: 3px solid #4e73df;

        }

        .btn-submit {

            width: 100%;

            padding: 15px;

            background-color: #4e73df;

            color: #fff;

            font-size: 18px;

            border-radius: 10px;

            border: none;

            cursor: pointer;

            transition: all 0.3s ease;

            margin-top: 20px;

        }

        .btn-submit:hover {

            background-color: #2e59d9;

        }

        .nota-fiscal {

            background: #fff;

            padding: 20px;

            border-radius: 10px;

            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);

            width: 600px;

            margin: 20px auto;

        }

        .nota-fiscal h2 {

            text-align: center;

        }

        .nota-fiscal p {

            font-size: 16px;

            line-height: 1.6;

        }

        .voltar {

            display: inline-block;

            background-color: #fff;

            padding: 20px 40px;

            border-radius: 12px;

            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);

            transition: transform 0.3s ease-in-out;

            color: black;

            text-decoration: none;

            position: absolute;

            top: 20px;

            left: 20px;

            }

        .voltar:hover {

            transform: scale(1.05);

        }

    </style>

</head>

<body>

    <a href="Loja_do_seu_Ze.html" class="voltar">Voltar</a>

    <div class="container">

        <div class="form-container">
            

            <h1>Escolha a Forma de Pagamento</h1>

            <div class="payment-option" id="pix" onclick="selectPayment('Pix', this)">

                <img src="imagens/pix.png" alt="Pix">

                <p>Pix</p>

            </div>

            <div class="payment-option" id="debito" onclick="selectPayment('Débito', this)">

                <img src="imagens/debito.png" alt="Débito">

                <p>Débito</p>

            </div>

            <div class="payment-option" id="credito" onclick="selectPayment('Crédito', this)">

                <img src="imagens/credito.jpg" alt="Crédito">

                <p>Crédito</p>

            </div>

            <div id="selected-payment" class="selected-payment">

                <p><strong>Forma de Pagamento Selecionada:</strong> <span id="payment-type">Nenhuma</span></p>
                
                    <button type="submit" class="btn-submit" onclick="confirmPayment()" >Confirmar Pagamento</button>

                <div id="notaFiscal" style="display:none;"></div>

            </div>

        </div>

    </div>

    <script>
        usuario = <?=$cpf?>;

        function selectPayment(paymentMethod, element) {

            const options = document.querySelectorAll('.payment-option');

            options.forEach(option => option.classList.remove('selected'));

            element.classList.add('selected');

            document.getElementById('payment-type').innerText = paymentMethod.charAt(0).toUpperCase() + paymentMethod.slice(1);

        }

        function confirmPayment() {

            const selectedMethod = document.getElementById('payment-type').innerText;

            if (selectedMethod === 'Nenhuma') {

                alert("Por favor, selecione uma forma de pagamento.");

            } else {

                const usuario = JSON.parse(localStorage.getItem('usuario'));

                if (usuario === false) {

                    alert("Por favor, faça login primeiro.");

                    return;

                }


                const notaFiscalData = generateInvoice(selectedMethod);

                localStorage.setItem('notaFiscal', JSON.stringify(notaFiscalData));

                
                
                window.location.href = "finaliza-compra.php";
            }
            
        }
        
        function generateInvoice(formaPagamento) {
            
            
            
            const produtos = [
                
                { nome: "Produto 1", quantidade: 2, preco: 29.99 },
                
                { nome: "Produto 2", quantidade: 1, preco: 99.99 }
                
            ];
            
            let valorTotal = 0;
            
            produtos.forEach(produto => {
                
                valorTotal += produto.quantidade * produto.preco;
                
            });    
            
            const notaFiscalData = {
                
                
                formaPagamento,
                
                produtos,
                
                valorTotal
                
            };

            return notaFiscalData;

        }
        

        
    </script>

</body>

</html>