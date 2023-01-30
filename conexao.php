<?php

//define horário do sistema
date_default_timezone_set('America/Manaus');

//variável nome do site
$nome_site = 'Atendimento CEAC';

//informações do banco de dados local
$usuario ='root';
$senha ='';
$banco ='atendimento';
$servidor ='localhost';
$port = 3306;

//faz um tratamento de erro se a conexao com o banco der errado
try {
    //conexão com a porta
    //$conn = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
    //echo "Conexão com banco de dados realizado com sucesso";

    //inicia conexao em PDO(evita injeção de SQL) e solicita os parametros de informação do banco ↑
    $conn = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");


} catch (PDOException $err) {
    //mensagem tratada
    die ("Erro: ao conectar com banco de dados". 
    $err->getMessage());
}


?>
