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
    $querySelect = $link->query("select id
                                        ,cpfcnpj
                                        ,nome
                                        ,endereco
                                        ,datanasc
                                        ,titulo
                                        ,valor
                                        ,datavenc 
                                 from tb_clientes where id='$id'");

    while($registros = $querySelect->fetch_assoc()):
        $id = $registros['id'];
        $cpfcnpj  = $registros['cpfcnpj'];
        $nome = $registros['nome'];
        $endereco = $registros['endereco'];
        $datanasc = $registros['datanasc'];
        $titulo = $registros['titulo'];
        $valor = $registros['valor'];
        $datavenc = $registros['datavenc'];
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

            <!-- Campo CPF/CNPJ -->
            <div class="input-field col s12">
                <i class="material-icons prefix">fingerprint</i>
                <input type="text" name="cpfcnpj" id="cpfcnpj" value="<?php echo $cpfcnpj ?>" maxlength="20" required autofocus>
                <label for="cpfcnpj">CPF/CNPJ</label>
            </div>
            
            <!-- Campo Nome -->
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus>
                <label for="nome">Nome do cliente</label>
            </div>

            <!-- Campo endereço -->
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>"maxlength="100" required>
                <label for="endereco">Endereco</label>
            </div>

            <!-- Campo Dt.Nasc -->
            <div class="input-field col s12">
                <i class="material-icons prefix">date_range</i>
                <input type="text" name="datanasc" id="datanasc" value="<?php echo $datanasc ?>" maxlength="10" required>
                <label for="datanasc">Dt.Nasc.</label>
            </div>

            <!-- Campo Titulo -->
            <div class="input-field col s12">
                <i class="material-icons prefix"></i>
                <input type="text" name="titulo" id="titulo" value="<?php echo $titulo ?>" maxlength="50" required>
                <label for="titulo">Titulo.</label>
            </div>

            <!-- Campo valor -->
            <div class="input-field col s12">
                <i class="material-icons prefix">monetization_on</i>
                <input type="text" name="valor" id="valor" value="<?php echo $valor ?>" maxlength="20" required>
                <label for="valor">Valor</label>
            </div>

            <!-- Campo Dt.Vencimento -->
            <div class="input-field col s12">
                <i class="material-icons prefix">date_range</i>
                <input type="text" name="datavenc" id="datavenc" maxlength="10" required>
                <label for="datavenc">Dt.Vencto.</label>
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