<?php 
    if(isset($_GET["btLogout"])){
        session_destroy();
        header("location: ../index.php");
    }

?>
<header>
    <div class="cabecalho">
        <div class="titulo">
            <p> CMS - Sistema de Gerenciamento do Site </p>
        </div>
        <div class="configuracaoImg">
            <img src="img/settings.jpg">
        </div>
    </div>
    <div class="menu">
        <div class="admConteudo">
            <img src="img/admConteudo.png">
            <a href="admConteudo.php">
                <p> Admin - Conteúdo </p>
            </a>
        </div>
        <div class="contato">
            <img src="img/contact.png">
            <a href="admFaleConosco.php">
                <p> Admin - Fale Conosco </p>
            </a>
        </div>
        <div class="admUser">
            <img src="img/user.png">
            <a href="admUsuario.php">
                <p> Admin - Usuarios </p>
            </a>
        </div>
        <?php
        session_start();
        $user = $_SESSION['nomeUser'];
        ?>
        <div class="userLog">
            <p> Bem vindo: </p> [<?= $user ?>]
            <form action="header.php" method="get" name="logout">
                <button type="submit" class="logOut" name="btLogout">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>