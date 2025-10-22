<?php

include("conecta_banco.php");
session_start();

$id_cliente = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : '';
$id_produto = isset($_SESSION['id_produto']) ? $_SESSION['id_produto'] : '';
$endereco_entrega = isset($_SESSION['endereco']) ? $_SESSION['endereco'] : '';
$preco_produto = isset($_SESSION['preco_produto']) ? floatval($_SESSION['preco_produto']) : 0.00;

$erro_id_venda = "";
$erro_data_venda = "";
$erro_forma_entrega = "";
$erro_forma_pagamento = "";
$erro_quantidade = "";

if (isset($_POST['botao'])) {
    $id_venda = trim($_POST['id_venda']);
    $data_venda = trim($_POST['data_venda']);
    $forma_entrega = trim($_POST['forma_entrega']);
    $forma_pagamento = trim($_POST['forma_pagamento']);
    $quantidade = trim($_POST['quantidade']);

    $valor_unitario = $preco_produto;
    $subtotal = $quantidade * $valor_unitario;
    $valor_total = $subtotal;

    $erro_validacao = 0;

    if ($id_venda === '') {
        $erro_id_venda = "Preencha o ID da venda.";
        $erro_validacao++;
    }
    if ($data_venda === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_venda)) {
        $erro_data_venda = "Data inválida ou vazia.";
        $erro_validacao++;
    }
    if ($forma_entrega === '') {
        $erro_forma_entrega = "Selecione forma de entrega.";
        $erro_validacao++;
    }
    if ($forma_pagamento === '') {
        $erro_forma_pagamento = "Selecione forma de pagamento.";
        $erro_validacao++;
    }
    if ($quantidade === '' || !is_numeric($quantidade) || $quantidade <= 0) {
        $erro_quantidade = "Quantidade inválida.";
        $erro_validacao++;
    }

    if ($erro_validacao === 0) {
        // Cria um formulário oculto para enviar via POST
        echo '
        <form id="envio" method="post" action="gravacomp.php">
            <input type="hidden" name="id_venda" value="'.$id_venda.'">
            <input type="hidden" name="id_cliente" value="'.$id_cliente.'">
            <input type="hidden" name="data_venda" value="'.$data_venda.'">
            <input type="hidden" name="endereco_entrega" value="'.$endereco_entrega.'">
            <input type="hidden" name="forma_entrega" value="'.$forma_entrega.'">
            <input type="hidden" name="forma_pagamento" value="'.$forma_pagamento.'">
            <input type="hidden" name="id_produto" value="'.$id_produto.'">
            <input type="hidden" name="quantidade" value="'.$quantidade.'">
            <input type="hidden" name="preco_unitario" value="'.$valor_unitario.'">
        </form>
        <script>document.getElementById("envio").submit();</script>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compra de Produto</title>
</head>
<body>
    <h2>Formulário de Compra</h2>
    <form method="post" action="cadvenda.php">
        
        <label>ID da Venda:</label><br>
        <input type="text" name="id_venda" value="<?php echo isset($_POST['id_venda']) ? htmlspecialchars($_POST['id_venda']) : ''; ?>">
        <span style="color:red;"><?php echo $erro_id_venda; ?></span><br><br>

        <label>ID do Cliente:</label><br>
        <input type="text" name="id_cliente" value="<?php echo htmlspecialchars($id_cliente); ?>" readonly><br><br>

        <label>Data da Venda:</label><br>
        <input type="date" name="data_venda" value="<?php echo isset($_POST['data_venda']) ? htmlspecialchars($_POST['data_venda']) : ''; ?>">
        <span style="color:red;"><?php echo $erro_data_venda; ?></span><br><br>

        <label>Endereço de Entrega:</label><br>
        <textarea name="endereco_entrega" rows="3" cols="40" readonly><?php echo htmlspecialchars($endereco_entrega); ?></textarea><br><br>

        <label>Forma de Entrega:</label><br>
        <select name="forma_entrega">
            <option value="">-- Selecione --</option>
            <option value="correios" <?php if(isset($forma_entrega) && $forma_entrega == 'correios') echo 'selected'; ?>>Correios</option>
            <option value="transportadora" <?php if(isset($forma_entrega) && $forma_entrega == 'transportadora') echo 'selected'; ?>>Transportadora</option>
            <option value="retirada" <?php if(isset($forma_entrega) && $forma_entrega == 'retirada') echo 'selected'; ?>>Retirada</option>
        </select>
        <span style="color:red;"><?php echo $erro_forma_entrega; ?></span><br><br>

        <label>Forma de Pagamento:</label><br>
        <select name="forma_pagamento">
            <option value="">-- Selecione --</option>
            <option value="cartao" <?php if(isset($forma_pagamento) && $forma_pagamento == 'cartao') echo 'selected'; ?>>Cartão</option>
            <option value="pix" <?php if(isset($forma_pagamento) && $forma_pagamento == 'pix') echo 'selected'; ?>>Pix</option>
            <option value="boleto" <?php if(isset($forma_pagamento) && $forma_pagamento == 'boleto') echo 'selected'; ?>>Boleto</option>
        </select>
        <span style="color:red;"><?php echo $erro_forma_pagamento; ?></span><br><br>

        <label>ID do Produto:</label><br>
        <input type="text" name="id_produto" value="<?php echo htmlspecialchars($id_produto); ?>" readonly><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade"><br><br>

        <label>Preço Unitário:</label><br>
        <input type="text" name="preco_unitario"><br><br>

        <input type="submit" name="botao" value="Finalizar Compra">

    </form>
</body>
</html>