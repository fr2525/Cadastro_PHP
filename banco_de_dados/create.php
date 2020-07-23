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

$querySelect = $link->query("SELECT email from tb_clientes");
$array_emails = [];

while ($cpfcnpjs = $querySelect->fetch_assoc()) :
    $cpfcnpjs_existentes = $cpfcnpjs['cpfcnpj'];
    array_push($array_cpfcnpjs, $cpfcnpjs_existentes);
endwhile;

if (in_array($cpfcnpj, $array_cpfcnpjs)) :
    $_SESSION['msg'] = "<p class='center red-text'>" . "Cliente já cadastrado com esse CPF/CNPJ" . "</p>";
    header("Location:../");
else :
    $queryInsert = $link->query("insert into tb_clientes values (default, '$cpfcnpj', '$nome', '$endereco','$datanasc', '$titulo', '$valor', '$datavenc')");
    $affected_rows = mysqli_affected_rows($link);
    if ($affected_rows > 0) :
        $_SESSION['msg'] = "<p class='center green-text'>" . "Cadastro efetuado com sucesso" . "</p>";
        header("Location:../");
    endif;
endif;
