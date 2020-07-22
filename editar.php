<?php
session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php' ;
?>

<div class="row container">
    <div class="col s12">
        <h5 class="light"> Edição de Registros </h5><hr>
    </div>    
</div>    
<?php 
    include_once('banco_de_dados/conexao.php');

    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['id'] = $id;
    $querySelect = $link->query("select id,nome,email,telefone from tb_clientes where id='$id'");

    while($registros = $querySelect->fetch_assoc()):
        $id = $registros['id'];
        $nome = $registros['nome'];
        $email = $registros['email'];
        $telefone = $registros['telefone'];
    endwhile;    
    
?>

<form action="banco_de_dados/update.php" method="post" class="col s12">
        <fieldset class="formulario" style="padding: 15px">
            <legend><img src="imagens/avatar-1.png" width="50"></legend>
            <h5 class="light center">Alteração de Clientes</h5>

            <?php
            if (isset($_SESSION['msg'])) :
                echo $_SESSION['msg'];
                session_unset();
            endif;
            ?>

            <!-- Campo Nome -->
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus>
                <label for="nome">Nome do cliente</label>
            </div>

            <!-- Campo email -->
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="text" name="email" id="email" value="<?php echo $email ?>" maxlength="50" required>
                <label for="email">e-mail</label>
            </div>

            <!-- Campo Telefone -->
            <div class="input-field col s12">
                <i class="material-icons prefix">call</i>
                <input type="text" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlength="15" required>
                <label for="email">telefone</label>
            </div>

            <!-- Botões -->
            <div class="input-field col s12">
                <input type="submit" value="Alterar" class="btn blue">
                <a href="consultas.php" class="btn red">Cancelar</a>
            </div>

        </fieldset>
    </form>
</div>
<?php include_once('includes/footer.inc.php') ?>