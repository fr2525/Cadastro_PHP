<?php
session_start();
include_once 'conexao.php';

$cpfcnpj  = filter_input(INPUT_POST, 'cpfcnpj', FILTER_SANITIZE_NUMBER_INT);
$nome    = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco   = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
$datanasc  = filter_input(INPUT_POST, 'datanasc' );
$titulo  = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$valor  = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
$datavenc = filter_input(INPUT_POST, 'datavenc');

$querySelect = $link->query("SELECT cpfcnpj from tb_clientes where cpfcnpj = '$cpfcnpj'");

$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0 ):
    $_SESSION['msg'] = "<p class='center red-text'>" . "Cliente já cadastrado com esse CPF/CNPJ" . "</p>";
    header("Location: ../consultas.php");
else :
    //$affected_rows = 0;
    $str_sql = "insert into tb_clientes (cpfcnpj,nome,datanasc,endereco,titulo,valor,datavenc) 
                                 values ( $cpfcnpj,'$nome', '$datanasc','$endereco', '$titulo', $valor, '$datavenc')";
    echo " str =  " . $str_sql;
    $queryInsert = $link->query($str_sql);
    $affected_rows = mysqli_affected_rows($link);
    echo "affected_rows = " . $affected_rows; 
    if ($affected_rows > 0) :
        $_SESSION['msg'] = "<p class='center green-text'>" . "Cadastro efetuado com sucesso" . "</p>";
        header("Location:../");
    endif;
endif;
