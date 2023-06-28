<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'lista_tarefas');

    $conn = new mysqli(HOST,USER,PASS,BASE);
    //criamos a conexao para a base de dados.

?>