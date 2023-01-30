<?php
//conectar com o arquivo conexao.php
include_once 'conexao.php';



   // Receber o tipo que a senha deve ser gerada
    $tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

// Verifica se vem o tipo de senha que deve ser gerada
if (!empty($tipo)) {

    // Criar a QUERY para recuperar os registros do BD
    $query_senha = "SELECT id, nome_senha 
                    FROM senhas
                    WHERE sits_senha_id=:sits_senha_id
                    AND tipos_senha_id=:tipos_senha_id
                    ORDER BY id ASC 
                    LIMIT 1";

    // Preparar a QUERY
    $result_senha = $conn->prepare($query_senha);

    // Substituir o link pelo valor
    $result_senha->bindValue(':sits_senha_id', 1, PDO::PARAM_INT);
    $result_senha->bindParam(':tipos_senha_id', $tipo, PDO::PARAM_INT);

    // Executar a QUERY
    $result_senha->execute();

    //verificar se encontrou alguma senha no BD
    if(($result_senha) and ($result_senha->rowCount() != 0)){

        //Ler as informações retornadas do banco de dados
        $row_senha = $result_senha->fetch(PDO::FETCH_ASSOC);

        //extrair para imprimir através da chave no arrya
        extract($row_senha);

        //criar QUERY e cadastrar senha gerada
        $query_senha_gerada = "INSERT INTO senhas_geradas (senha_id, sits_senha_id, created) VALUES ($id, 2, NOW()) ";

        //preparação a query
        $cad_senha_gerada = $conn->prepare($query_senha_gerada);

        //executar a query
        $cad_senha_gerada->execute();

        //rertorna TRUE quando cadastrou a senha e retorna FALSE quando não conseguir cadastrar
        if($cad_senha_gerada->rowCount()){
            $retorna = ['status' => false, 'msg' => "<p style='color: green;'> Senha gerada </p>"];
        } else{
            //cria o array com a posição indicand que houve erro e exibe a msg de erro
            $retorna = ['status' => true, 'msg' => "<p style='color: #foo;'> Senhas Esgotadas </p>"];
        }

        //var_dump($row_senha); -- teste de leitura de linha


        $retorna = ['status' => false, 'msg' => "<p style='color: green;'> Senha gerada </p>"];
        } else{  
            $retorna = ['status' => true, 'msg' => "<p style='color: #foo;'> Senhas Esgotadas </p>"];
        }       

    //cria o array com a posição indicand que houve erro e exibe a msg de erro
    } else {
        $retorna = ['status' => true, 'msg' => "<p style='color: #f00;'> Erro:Senha não gerada </p>"];
    }

    //retorna os dados para o javaScript
    echo json_encode($retorna);

    ?> 