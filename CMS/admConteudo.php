<?php 
    include_once('BD/conecta.php');

    $conex = conexaoMysql();

        $admUsuario = "";
        $admFaleConosco = "";
        $admConteudo = "";
        $admProduto = "";
        $tipoNivel = "";

    if(isset($_POST['btnEnviar'])){

        $admUsuario = $_POST['rdoadminUsuario'];
        $admFaleConosco = $_POST['rdoAdminFaleConosco'];
        $admConteudo = $_POST['rdoAdminConteudo'];
        $admProduto = $_POST['rdoadminProduto'];
        $tipoNivel = $_POST['sltadmNivel'];
    
    if(!($admConteudo || $admFaleConosco || $admUsuario || $admProduto) == ""){
        $sql = "insert into tblNivel (administrarUsuario, administrarConteudo, 
        administrarFaleConosco, administrarProduto, tipo) 
        values ('".$admUsuario."', '".$admConteudo."', '".$admFaleConosco."', '".$admProduto."', '".$tipoNivel."')";

        # echo($sql); exit;

        if(mysqli_query($conex, $sql)){
            echo("<script> alert('Dados Inserido com Sucesso')</script>");
        }
        else{
            echo("<script> alert('Erro ao Inserir os dados')</script>");
        }
    }
    else{
        echo("<script> alert('Preencha os Dados')</script>");
        header('location: admNiveis.php');
    }
};
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> CMS - Padokas </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    </head>
    <body>
        <div class="container">
            <?php 
                include_once('header.php');
            ?>
            <div class="conteudo">
                <div class="curiosidade">
                    <img src="img/curious.png">
                    <a href="curiosidade.php"> Curiosidade</a>
                </div>
                <div class="loja">
                    <img src="img/stores.png">
                    <a href="loja.php"> Lojas </a>
                </div>
                <div class="sobre">
                    <img src="img/sobre.png">
                    <a href="sobre.php"> Sobre </a>
                </div>
                <div class="sobre">
                    <img src="img/sobre.png">
                    <a href="home.php"> Home </a>
                </div>
            </div>
                
        </div>           
            
       
    </body>
</html>