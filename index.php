<?php session_start()  ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//include_once 'banco_de_dados/conexao.class.php';

//$conexaoOk = false;

//$conectando = new conexao();

//$conexaoOk = $conectando->connect();

//$conectando->disconnect();

//If (!$conexaoOk)
//    die("Conexão ao banco falhou, entre em contato com a T.I.");
//?>
<?php include_once('includes/header.inc.php');
      include_once('includes/menu.inc.php');
?>

<div class="row container">
    <form action="banco_de_dados/create.php" method="post" class="col s12">
        <fieldset class="formulario" style="padding: 15px">
            <legend><img src="imagens/avatar-1.png" width="50"></legend>
            <h5 class="light center">Cadastro de Clientes</h5>

            <?php
            if (isset($_SESSION['msg'])) :
                echo $_SESSION['msg'];
                session_unset();
            endif;
            ?>

            <div class="row">
                <!-- Campo CPF/CNPJ -->
                <div class="input-field col s3">
                    <i class="material-icons prefix">fingerprint</i>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" maxlength="20" required autofocus>
                    <label for="cpfcnpj">CPF/CNPJ</label>
                </div>
                <!-- Campo Nome -->
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                    <label for="nome">Nome do cliente</label>
                </div>
                <!-- Campo Dt.Nasc -->
                <div class="input-field col s3">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" name="datanasc" id="datanasc" class="datepicker" required="">
                    <label for="datanasc">Dt.Nasc.</label>
                </div>

            </div>

            <!-- Campo endereço -->
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="text" name="endereco" id="endereco" maxlength="50" required="">
                <label for="endereco">Endereco</label>
            </div>

            <!-- Campo Titulo -->
            <div class="input-field col s12">
                <i class="material-icons prefix"></i>
                <input type="text" name="titulo" id="titulo" maxlength="50" required="">
                <label for="titulo">Titulo.</label>
            </div>

            <div class="row">
                <!-- Campo valor -->
                <div class="input-field col s6">
                    <i class="material-icons prefix">monetization_on</i>
                    <input type="text" name="valor" id="valor" maxlength="20" required="">
                    <label for="valor">Valor</label>
                </div>

                <!-- Campo Dt.Vencimento -->
                <div class="input-field col s6">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" name="datavenc" id="datavenc" class="datepicker" required="">
                    <label for="datavenc">Dt.Vencto.</label>
                </div>
            </div>

            <!-- Botões -->
            <div class="input-field col s12">
                <input type="submit" value="Cadastrar" class="btn blue">
                <input type="reset" value="Limpar" class="btn red">
            </div>

        </fieldset>
    </form>
</div>

<?php include_once('includes/footer.inc.php');
?>