<?php
session_start();

$erro_id = "";
$erro_nome = "";
$erro_descricao = "";
$erro_marca = "";
$erro_preco = "";
$erro_estoque = "";
$erro_detalhes = "";

$erro_validacao = 0;

if (isset($_POST["botao"])) {
    $_SESSION["id_produto"] = $_POST["id_produto"];
    $_SESSION["nome_produto"] = $_POST["nome_produto"];
    $_SESSION["descricao"] = $_POST["descricao"];
    $_SESSION["marca"] = $_POST["marca"];
    $_SESSION["preco"] = $_POST["preco"];
    $_SESSION["estoque"] = $_POST["estoque"];
    $_SESSION["detalhes"] = $_POST["detalhes"];

    $id_produto = $_SESSION["id_produto"];
    $nome_produto = $_SESSION["nome_produto"];
    $descricao = $_SESSION["descricao"];
    $marca = $_SESSION["marca"];
    $preco = $_SESSION["preco"];
    $estoque = $_SESSION["estoque"];
    $detalhes = $_SESSION["detalhes"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<body>
    <h2>TIPO DE SALGADO</h2>
    <form action="cadpro.php" method="post">

        Qual salgado:<br>
        <input type="text" name="nome_produto" value="<?php if (isset($_SESSION["nome_produto"])) echo $_SESSION["nome_produto"]; ?>">
        <?php echo $erro_nome; ?>
        <br><br>

        Descrição:<br>
        <textarea name="descricao" rows="4" cols="50"><?php if (isset($_SESSION["descricao"])) echo $_SESSION["descricao"]; ?></textarea>
        <?php echo $erro_descricao; ?>
        <br><br>

        Preço:<br>
        <input type="text" name="preco" value="<?php if (isset($_SESSION["preco"])) echo $_SESSION["preco"]; ?>">
        <?php echo $erro_preco; ?>
        <br><br>

        Estoque:<br>
        <input type="text" name="estoque" value="<?php if (isset($_SESSION["estoque"])) echo $_SESSION["estoque"]; ?>">
        <?php echo $erro_estoque; ?>
        <br><br>

        <input type="submit" name="botao" value="Cadastrar Produto">
    </form>
</body>

</html>