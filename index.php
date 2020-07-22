<?php session_start()  ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once('includes/header.inc.php')
?>

<?php include_once('includes/menu.inc.php')
?>

<div class="row container">
    <p>&nbsp;</p>
    <div  class="row container">
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

            <!-- Campo Nome -->
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                <label for="nome">Nome do cliente</label>
            </div>

            <!-- Campo email -->
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="text" name="email" id="email" maxlength="50" required>
                <label for="email">e-mail</label>
            </div>

            <!-- Campo Telefone -->
            <div class="input-field col s12">
                <i class="material-icons prefix">call</i>
                <input type="text" name="telefone" id="telefone" maxlength="15" required>
                <label for="email">telefone</label>
            </div>

            <!-- Botões -->
            <div class="input-field col s12">
                <input type="submit" value="Cadastrar" class="btn blue">
                <input type="reset" value="Limpar" class="btn red">
            </div>

        </fieldset>
    </form>
</div>
</div>
<?php include_once('includes/footer.inc.php')
?>