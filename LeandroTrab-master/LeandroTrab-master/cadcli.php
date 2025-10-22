<?php
session_start();

$erro_nome = "";
$erro_email = "";
$erro_id_cliente = "";
$erro_telefone = "";
$erro_endereco = "";
$erro_bairro = "";
$erro_complemento = "";
$erro_cep = "";
$erro_cpf = "";
$erro_cidade = "";
$erro_estado = "";

$erro_validacao = 0;

if (isset($_POST["botao"])) {
    $_SESSION["cpf"]           = $_POST["cpf"];
    $_SESSION["nome"]           = $_POST["nome"];
    $_SESSION["email"]          = $_POST["email"];
    $_SESSION["endereco"]       = $_POST["endereco"];
    $_SESSION["bairro"]         = $_POST["bairro"];
    $_SESSION["complemento"]    = $_POST["complemento"];
    $_SESSION["cep"]            = $_POST["cep"];
    $_SESSION["id_cliente"]     = $_POST["id_cliente"];
    $_SESSION["telefone"]       = $_POST["telefone"];
    $_SESSION["cidade"]       = $_POST["cidade"];
    $_SESSION["estado"]       = $_POST["estado"];

    $cpf         = $_SESSION["cpf"];
    $nome        = $_SESSION["nome"];
    $email       = $_SESSION["email"];
    $endereco    = $_SESSION["endereco"];
    $bairro      = $_SESSION["bairro"];
    $complemento = $_SESSION["complemento"];
    $cep         = $_SESSION["cep"];
    $id_cliente  = $_SESSION["id_cliente"];
    $telefone    = $_SESSION["telefone"];
    $cidade      = $_SESSION["cidade"];
    $estado      = $_SESSION["estado"];


    if (trim($nome) === "") {
        $erro_nome = "<span style='color:blue'>Preencha o nome</span>";
        $erro_validacao++;
    }

    if (trim($email) === "") {
        $erro_email = "<span style='color:blue'>Preencha o email</span>";
        $erro_validacao++;
    }

    if (trim($cpf) === "") {
        $erro_cpf = "<span style='color:blue'>Preencha o CPF</span>";
        $erro_validacao++;
    }

    if (trim($endereco) === "") {
        $erro_endereco = "<span style='color:blue'>Preencha o endereço</span>";
        $erro_validacao++;
    }

    if (trim($bairro) === "") {
        $erro_bairro = "<span style='color:blue'>Preencha o bairro</span>";
        $erro_validacao++;
    }

    if (trim($cep) === "") {
        $erro_cep = "<span style='color:blue'>Preencha o CEP</span>";
        $erro_validacao++;
    }

    if (trim($telefone) === "") {
        $erro_telefone = "<span style='color:blue'>Preencha o telefone</span>";
        $erro_validacao++;
    }

    if (trim($cidade) === "") {
        $erro_cidade = "<span style='color:blue'>Preencha a cidade</span>";
        $erro_validacao++;
    }

    if (trim($estado) === "") {
        $erro_estado = "<span style='color:blue'>Preencha o estado</span>";
        $erro_validacao++;
    }

    if (trim($id_cliente) === "") {
        $erro_id_cliente = "<span style='color:blue'>Preencha o ID do cliente</span>";
        $erro_validacao++;
    }

    if ($erro_validacao === 0) {
        header("Location:cadpro.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>VENDA DE SALGADo</title>
</head>

<body>
    <header>
        <h1>Venda de SALGADO</h1>
    </header>
    <main>
        <section class="signup-form">
            <h2>Dados do Cliente</h2>
            <form action="cadcli.php" method="post">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="15" minlength="11" required
                    value="<?php if (isset($_SESSION["cpf"])) echo $_SESSION["cpf"]; ?>" />
                <?php echo $erro_cpf ?>
                <br /><br />


                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" size="50" maxlength="50" required
                    value="<?php if (isset($_SESSION["nome"])) echo $_SESSION["nome"]; ?>" />
                <?php echo $erro_nome ?>
                <br /><br />

                Email:
                <input type="text" name="email" size="60" maxlength="50"
                    value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"]; ?>" />
                <?php echo $erro_email ?>
                <br /><br />

                Endereço:
                <input type="text" name="endereco" size="60" maxlength="100"
                    value="<?php if (isset($_SESSION["endereco"])) echo $_SESSION["endereco"]; ?>" />
                <?php echo $erro_endereco ?>
                <br /><br />

                Bairro:
                <input type="text" name="bairro" size="60" maxlength="50"
                    value="<?php if (isset($_SESSION["bairro"])) echo $_SESSION["bairro"]; ?>" />
                <?php echo $erro_bairro ?>
                <br /><br />

                Complemento:
                <input type="text" name="complemento" size="60" maxlength="50"
                    value="<?php if (isset($_SESSION["complemento"])) echo $_SESSION["complemento"]; ?>" />
                <?php echo $erro_complemento ?>
                <br /><br />

                CEP:
                <input type="text" name="cep" size="20" maxlength="9"
                    value="<?php if (isset($_SESSION["cep"])) echo $_SESSION["cep"]; ?>" />
                <?php echo $erro_cep ?>
                <br /><br />

                ID do Cliente:
                <input type="text" name="id_cliente" size="20" maxlength="10"
                    value="<?php if (isset($_SESSION["id_cliente"])) echo $_SESSION["id_cliente"]; ?>" />
                <?php echo $erro_id_cliente ?>
                <br /><br />

                Telefone:
                <input type="text" name="telefone" size="20" maxlength="15"
                    value="<?php if (isset($_SESSION["telefone"])) echo $_SESSION["telefone"]; ?>" />
                <?php echo $erro_telefone ?>
                <br /><br />

                Cidade:
                <input type="text" name="cidade" size="40" maxlength="50"
                    value="<?php if (isset($_SESSION["cidade"])) echo $_SESSION["cidade"]; ?>" />
                <?php echo $erro_cidade ?>
                <br /><br />

                Estado:
                <input type="text" name="estado" size="5" maxlength="2"
                    value="<?php if (isset($_SESSION["estado"])) echo $_SESSION["estado"]; ?>" />
                <?php echo $erro_estado ?>
                <br /><br />

                <input type="submit" name="botao" value="Enviar" />

            </form>
        </section>
    </main>
</body>

</html>