<?php

//include_once 'conexao.class.php';

$utf8 = header("Content-Type: text/html; charset=utf-8");

//$conexaoOk = false;

//$conectando = new conexao();

//$conexaoOk = $conectando->connect();

//If (!$conexaoOk)
//    die("Conexão ao banco falhou, entre em contato com a T.I.");

//while (!$conexaoOk) :
    // Dev
    @$link = new mysqli('localhost','root','','db_financeiro');
    // Prod
    //@$link = new mysqli('localhost','140301','Lorenzzo2017','140301');
    /* check connection */
    if ($link->connect_error > 0) {
        die ("Conexão falhou"); // Conexao falhou banco não existe: Criando o banco

    }
//endwhile
$link->set_charset('utf8');
//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//die "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);