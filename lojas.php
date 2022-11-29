<?php 
    include_once('BD/conecta.php');
    $conex = conexaoMysql();
?>
<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>  Padoka Hill Valley  </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
              
    </head>
    <body>
         <?php 
            include_once("header.php");
        ?>
        <div id="container" class="alinhamentoAoCentro">     
            <div class="conteudo">
                <?php 
                    $sql = "select * from tblLoja where estado = 1";
                    
                    $selectConteudo = mysqli_query($conex,$sql);
                    while ($rsConteudo = mysqli_fetch_assoc($selectConteudo)) {
                ?>
                <div id="lojas" class="alinhamentoAocentro texto">
                    <h1> <?=$rsConteudo['titulo']?> </h1>
                    <div id="imgLojas">
                        <img src="CMS/BD/arquivo/<?=$rsConteudo['imagem']?>">
                    </div>
                    
                </div>
                <?php
                    }
                ?>
            </div>    
            <?php 
                include_once("footer.php")
            ?>
                
        </div>
    <script src="js/jquery.js"></script>
    <script src="js/funcaoMenu.js"> 
        abreMenu();
    </script>
    </body>
</html>