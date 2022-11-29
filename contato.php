<?php
     include_once('BD/conecta.php');

    $conex = conexaoMysql(); 

    #inicializando a variavel 
    $nome = '';
    $telefone = '';
    $celular = '';
    $email = '';
    $cep = '';
    $endereco = '';
    $cidade = '';
    $bairro = '';
    $homePage = '';
    $linkFacebook = '';
    $filtro = '';
    $mensagem = '';
    $sexo = '';
    $profissao = '';
    $idContato = '';

    # verifica se o botao foi acionado 
    if(isset($_POST['btnEnviar'])){
       $nome = $_POST['txtNome'];
       $telefone = $_POST['txtTelefone'];
       $celular = $_POST['txtCell'];
       $email = $_POST['txtEmail'];
       $cep = $_POST['txtCep'];
       $endereco = $_POST['txtEndereco'];
       $cidade = $_POST['txtCidade'];
       $bairro = $_POST['txtBairro'];
       $homePage = $_POST['txtHomePage'];
       $linkFacebook = $_POST['txtLinkFace'];
       $filtro = $_POST['sltFiltro'];
       $mensagem = $_POST['txtMensagem'];
       $sexo = $_POST['rdoGenero'];
       $profissao = $_POST['txtProfissao'];
       
    };
    if(!($nome || $telefone || $celular || $email || $mensagem || $profissao ) == ""){
       # script para enviar as informações ao BD
           
       $sql = "insert into tblContato(nome, telefone, celular, email, cep, endereco, cidade, bairro, 
                homePage, linkFacebook, filtro, mensagem, sexo, profissao) 
               values ('".$nome."', '".$telefone."', '".$celular."', '".$email."', 
               '".$cep."', '".$endereco."', '".$cidade."', '".$bairro."',
               '".$homePage."', '".$linkFacebook."', '".$filtro."', '".$mensagem."',
               '".$sexo."', '".$profissao."')";           
        
        #echo($sql);
        # EXECUTANDO O INSERT NO BANCO DE DADOS
        if(mysqli_query($conex ,$sql)){
            echo("<script> alert('registro inserido com sucesso') </script>");
        }
        else{
            echo("<script> alert('erro ao salvar os dados') </script>");
        }   
        
    }
?>

<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>  Padoka Hill Valley  </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
              
    </head>
    <body>
        <!-- Area do cabecalho -->
        <?php 
            include_once("header.php");
        ?>
        <div id="container" class="alinhamentoAoCentro">
             
            <!-- div do slide  -->
            
                <div class="conteudo">
                    <div id="formularioContato" class="alinhamentoAoCentro texto">
                    <h1> Entre em Contato </h1>
                <form method="post" action="contato.php" name="frmContado">
                        
                    <div class="dadosPadronizados">
                        <div class="descricao"> Nome*: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtNome" value="" maxlength="50" required>
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao" > Telefone*: 

                        </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtTelefone" value="" maxlength="10" id="telefone" placeholder="Digite o 11 antes do numero" required>
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Celular*: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtCell" value="" maxlength="11" id="celular" placeholder="Digite o 11 antes do numero" required>
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Email*: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtEmail" value="" maxlength="50" required>
                        </div>
                    </div>
                     <div class="dadosPadronizados">
                        <div class="descricao"> Cep: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtCep" value="" id="cep" maxlength="9">
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Endereço: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtEndereco" value="" id="endereco" >
                        </div>
                    </div>
                     <div class="dadosPadronizados">
                        <div class="descricao"> Cidade: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtCidade" value=""  id="cidade" >
                        </div>
                    </div>
                     <div class="dadosPadronizados">
                        <div class="descricao"> Bairro: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtBairro" value=""  id="bairro" >
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Home Page: 

                        </div>
                        <div class="entradaDeDados"> 
                            <input type="url" name="txtHomePage" value="" maxlength="50">
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Link no Facebook: </div>
                        <div class="entradaDeDados"> 
                            <input type="url" name="txtLinkFace" value="" maxlength="50">
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Filtro: </div>
                        <div class="entradaDeDados"> 
                            <select name="sltFiltro">
                                <p> Filtro </p>
                                <option value="Sugestao"> Sugestâo  </option>
                                <option value="Critica"> Critica </option>
                            </select>
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Mensagem*: </div>
                        <div class="entradaDeDados"> 
                            <textarea name="txtMensagem" cols="30" rows="7" maxlength="210" required></textarea>
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Sexo: </div>
                        <div class="entradaDeDados"> 
                            <input type="radio"  name="rdoGenero" value="F"> Feminino.
                            <input type="radio" name="rdoGenero" value="M"> Masculino.
                            <input type="radio" name="rdoGenero" value="O"> Outros.
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="descricao"> Profissão*: </div>
                        <div class="entradaDeDados"> 
                            <input type="text" name="txtProfissao" value="" maxlength="50" required>
                        </div>
                    </div>
                    <div class="dadosPadronizados">
                        <div class="entradaDeDados"> 
                            <input type="submit" name="btnEnviar" value="Enviar" class="btnEnviar">
                        </div>
                        <div class="entradaDeDados"> 
                            <input type="submit" name="btnLimpar" value="Limpar" class="btnEnviar">
                        </div>
                    </div>  
                </form>
            </div>
                    
                </div>
                <!--  Area do Footer  -->
                 <?php 
                    include_once("footer.php")
                ?>
                
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/funcaoMenu.js"> 
            abreMenu();
        </script>
        <script src="js/funcaoCep.js"></script>
        <script src="js/funcaoTel.js"></script>
    </body>
</html>