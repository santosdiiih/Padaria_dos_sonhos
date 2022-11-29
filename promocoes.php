<? 

?>
<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>  Padoka Hill Valley  </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    </head>
    <body>
<!-- Container que possui todas as informacoes visuais da pagina -->
        <?php 
            include_once("header.php");
        ?>
        <div id="container" class="alinhamentoAoCentro">
            <!-- Area do cabecalho -->
            <div>
                
            </div>
            
            <!--  Area  do conteudo da pagina  -->
            <div class="conteudo">
                <div class="containerPromocoes alinhamentoAoCentro">
                    <div class="promocoesTexto texto">
                        <h1> Café </h1>
                        <p>
                            O café da manhã é a refeição mais importante do nosso dia, pois ele é reponsável por nossas energias para começar o dia.
                        </p>
                    </div>
                    <div class="promocoesImagem alinhamentoAoCentro">
                        <img src="imagens/cafeDaManha.jpg">
                    </div>
                    <div class="promocoesImagem alinhamentoAoCentro">
                        <img src="imagens/cafe-da-manha.jpg">
                    </div>
                    <div class="promocoesImagem alinhamentoAoCentro">
                        <img src="imagens/-cafe-da-manha-padaria.jpg">
                    </div>
                </div>
                <div class="containerPromocoes alinhamentoAocentro">
                    <div class="promocoesTexto texto">
                        <h1> Lanches </h1>
                        <p>
                            Os lanches foram pensados naqueles que não querem comer mas não abrem mão da comidas saldáveis, promovendo leveza e saciando a fome. 
                        </p>
                    </div>
                    <div class="promocoesImagem alinhamentoAoCentro">
                        <img src="imagens/lanche-o-melhor-do-mundo-da-real.jpg">
                    </div>
                    <div class="promocoesImagem alinhamentoAoCentro">
                        <img src="imagens/lanches-naturais.jpg"> 
                    </div>
                    <div class="promocoesImagem alinhamentoAoCentro">
                        <img src="imagens/padarias-lanches-1.jpg">
                    </div>
                </div>
                <div class="containerPromocoes alinhamentoAoCentro">
                    <div class="promocoesTexto texto">
                        <h1> Acompanhamentos </h1>
                        <p>
                            Nossas sobremessas são famossas não apenas pelo sabor delicioso mas também por sua aparência chamativa. 
                        </p>
                    </div>
                    <div class="promocoesImagem">
                        <img src="imagens/acompanhamento.jpg">
                    </div>
                    <div class="promocoesImagem">
                        <img src="imagens/acompanhamento2.jpg">
                    </div>
                    <div class="promocoesImagem">
                        <img src="imagens/acompanhamento4.jpg">
                    </div>
                </div>
                <div class="containerPromocoes alinhamentoAoCentro">
                    <div class="promocoesTexto texto">
                        <h1> Bebidas </h1>
                        <p>
                            Com objetivo de atender todos os publicos nossa padaria busca inovar e ampliar nossso  cardapio de bebidas. 
                        </p>
                    </div>
                    <div class="promocoesImagem">
                        <img src="imagens/bebidas.jpg">
                    </div>
                    <div class="promocoesImagem">
                        <img src="imagens/bebidaDiversidade.jpg">
                    </div>
                    <div class="promocoesImagem">
                        <img src="imagens/padaria-cafe.png">
                    </div>
                </div>
                
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