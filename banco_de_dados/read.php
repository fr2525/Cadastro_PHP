<?php
include_once 'conexao.php';

$querySelect = $link->query("select id, cpfcnpj, nome, endereco, datanasc, titulo, valor, datavenc from tb_clientes");
while ($registros = $querySelect->fetch_assoc()):
    $id = $registros['id'];
    $cpfcnpj = $registros['cpfcnpj'];
    $nome = $registros['nome'];
    $endereco = $registros['endereco'];
    $datanasc = $registros['datanasc'];
    $titulo = $registros['titulo'];
    $valor = $registros['valor'];
    $datavenc = $registros['datavenc'];

    echo "<tr>";
    echo "<td>$cpfcnpj</td>";
    echo "<td>$nome</td>";
    echo "<td>$endereco</td>";
    echo "<td>$datanasc</td>"; 
    echo "<td>$titulo</td>";
    echo "<td>$valor</td>";
    echo "<td>$datavenc</td>";


    echo "<td><a href='editar.php?id=$id'><i class='material-icons'>edit</i></td>";
    echo "<td><a href='banco_de_dados/delete.php?id=$id'><i class='material-icons'>delete</i></td>";
    echo "</tr>";
endwhile;

 ?>   