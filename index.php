<?php 
    include_once("BD/conecta.php");
    $conex = conexaoMysql();
?>
<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Padoka Hill Valley </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/styleSlideHome.css">
        <style>
              #imagemCard {
                width: 150px;
                height: 150px;
                margin-left: auto;
                margin-right: auto;
                border: solid 1px black;
                margin-bottom: 10px;
            }   
            #imagemCard img{
                width: 150px;
                height: 150px;
           }
        </style>
    </head>
    <body>
        <!-- Area do cabecalho -->
        <?php
            include_once("header.php");
        ?>
        <div id="container" class="alinhamentoAoCentro">
            <div class="conteudo alinhamentoAoCentro">
                <!-- div do slide  -->
                <div id="slideHome" class="alinhamentoAoCentro">
                    <ul>
                        <li>
                            <figure>
                                <img src="imagens/imgSlide/img1.jpg">
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="imagens/imgSlide/img2.jpg">
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="imagens/imgSlide/img3.jpg">
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="imagens/imgSlide/img4.jpg">
                            </figure>
                        </li>
                    </ul>
                    <div id="previous"> &laquo;</div>
                    <div id="next"> &raquo;</div>
                </div>
                <!--   Area dos cards  -->
                <div class="alinhamentoAoCentro containerConteudo"> 
                    <div class="containerCard alinhamentoAoCentro"> 
                        <?php 
                            $sql = 'select * from tblProduto where estado = 1';
                            $selectdados = mysqli_query($conex, $sql);
                            while($rsIndex = mysqli_fetch_assoc($selectdados)){
                        ?>   
                        <div class="card">
                            <div id="imagemCard" class="imgBanco">
                                <img src="CMS/BD/arquivo/<?=$rsIndex['imagem']?>">
                            </div>
                            <div id="informacoesCard">
                                <p> Nome: <?=$rsIndex['nome']?></p>
                                <p> Descrição: <?=$rsIndex['descricao']?></p>
                                <p> Preço: <?=$rsIndex['preco']?></p>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!--  Area do Footer  -->
            <?php
                include_once("footer.php")
            ?>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/jqueryCycle.js"></script>
        <script src="js/funcaoSlide.js"></script>
    </body>
</html>