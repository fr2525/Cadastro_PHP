<?php
session_start();
include_once 'conexao.php';

$id = $_SESSION['id'];

$cpfcnpj  = filter_input(INPUT_POST, 'cpfcnpj', FILTER_SANITIZE_NUMBER_INT);
$nome    = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco   = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
$datanasc  = filter_input(INPUT_POST, 'datanasc' );
$titulo  = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$valor  = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
$datavenc = filter_input(INPUT_POST, 'datavenc');

$queryUpdate = $link->query("update tb_clientes SET cpfcnpj = '$cpfcnpj'
                                                    ,nome ='$nome'
                                                    ,endereco = '$endereco'
                                                    ,datanasc = '$datanasc'
                                                    ,titulo ='$titulo'
                                                    ,valor = '$valor'
                                                    ,datavenc = '$datavenc'
                                                     WHERE id = '$id'");
$affected_rows = mysqli_affected_rows($link);
if ($affected_rows > 0 ):
    header("Location: ../consultas.php");
endif;    

?>

