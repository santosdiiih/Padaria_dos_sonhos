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
            <!--  Area  do conteudo da pagina  -->
            <div class="conteudo">
                <?php 
                    $sql = 'select * from tblsobreconteudo where estado = 1';
                    $selectDados = mysqli_query($conex, $sql);
                    while($rsSobre = mysqli_fetch_assoc($selectDados)){
                ?>
                <div class="conteudoSobre alinhamentoAoCentro">
                    <div id="sobreInicio" class="texto alinhamentoAoCentro">
                        <h1><?=$rsSobre['titulo']?></h1>
                        <p>
                           <?=$rsSobre['texto']?>
                        </p>
                    </div>
                    <div id="sobreImagem" class="alinhamentoAoCentro">
                        <figure>
                            <img src="CMS/BD/arquivo/<?=$rsSobre['imagem']?>"> 
                        </figure>                        
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