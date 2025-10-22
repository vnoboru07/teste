<?php
require("conecta_banco.php");

$id_venda         = $_POST['id_venda'];
$id_cliente       = $_POST['id_cliente'];
$data_venda       = $_POST['data_venda'];
$endereco_entrega = $_POST['endereco_entrega'];
$forma_entrega    = $_POST['forma_entrega'];
$forma_pagamento  = $_POST['forma_pagamento'];
$id_produto       = $_POST['id_produto'];
$quantidade       = $_POST['quantidade'];
$preco_unitario   = str_replace(',', '.', $_POST['preco_unitario']); 

$subtotal         = $quantidade * $preco_unitario;
$valor_total      = $subtotal;

$sql = "INSERT INTO vendas 
    (id_venda, id_cliente, data_venda, endereco_entrega, forma_entrega, forma_pagamento, id_produto, quantidade, preco_unitario, subtotal, valor_total) 
    VALUES 
    ('$id_venda', '$id_cliente', '$data_venda', '$endereco_entrega', '$forma_entrega', '$forma_pagamento', '$id_produto', '$quantidade', '$preco_unitario', '$subtotal', '$valor_total')";

if ($mysqli->query($sql)) {
    echo "Venda registrada com sucesso!";
} else {
    echo " Erro ao registrar venda: " . $mysqli->error;
}
?>