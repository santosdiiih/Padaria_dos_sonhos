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
                <div class="cadastrarUsuario">
                    <img src="img/addUser.png" >
                    <a href="cadastrarUsuario.php">
                        Cadastrar novo Usuario.
                    </a>
                </div>
                <div class="visualizarUsuario">
                    <img src="img/visualizarUser.png" >
                    <a href="visualizarUsuario.php">
                        Visualizar usuarios.
                    </a>
                </div>
                <div class="admNiveis">
                    <img src="img/admNivel.png" >
                    <a href="admNiveis.php">
                        Administrar Niveis.
                    </a>
                </div>
            </div>

            
            
        </div>
    </body>
</html>