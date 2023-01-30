//função para gerar senha conforme o tipo enviado pelo parametro
async function gerarSenha(tipoSenha){

    
    //chama o arquivo PHP para gerar a senha
    const dados = await fetch('gerar_senha.php?tipo=' + tipoSenha);

    //ler os dados retornado pelo PHP
    const resposta= await dados.json();
    console.log(resposta);

    //acessar o if quando houver erro no arquivo "gerar_senha.php"
    if(resposta ['status']){
        //enviar a msg de erro para o seletor "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta ['msg'];
    }   else{
        //enviar a msg de erro para o seletor "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta ['msg'];
    }

}