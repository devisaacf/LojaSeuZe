<?php
// session_start();
// if (isset($_POST['formaPagamento'])) {
//     $formaPagamento = $_POST['formaPagamento'];
//     echo "Olá, " . htmlspecialchars($formaPagamento) . "! Sua requisição AJAX foi processada";
// } else {
//     echo "Nenhum nome enviado";
// }

session_start();
include 'conexao.php';



if (isset($_POST['formaPagamento'])) {
    $_SESSION['formaPagamento'] = $_POST['formaPagamento'];
    echo "Forma de pagamento registrada: " . htmlspecialchars($_POST['formaPagamento']);
} else {
    echo "Erro: nenhuma forma de pagamento recebida.";
}


?>