<?php
include_once 'conexao.php';

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $nome_site?></title>
</head>
<body>

    <h2> <?php echo $nome_site?> </h2>

    <!--receber a msg de erro do javaScript-->
    <span id="msgAlerta"> </span>

    <!-- Chamar a funcao "gerarSenha" do JavaScript para gerar senha para atendimento convencional -->
    <p><button type="button" onclick="gerarSenha(1)">Convencional</button></p>

    <!-- Chamar a funcao "gerarSenha" do JavaScript para gerar senha para atendimento preferencial -->
    <p><button type="button" onclick="gerarSenha(2)">Preferencial</button></p>

    

    <script src="js/main.js"></script>
</body>
</html>