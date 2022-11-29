<?php
    include_once('conecta.php');
    $conex = conexaoMysql();

    if(isset($_POST['btnEnviar'])){

        session_start();

        $titulo = $_POST['txtTitulo'];
        $conteudo = $_POST['txtConteudo'];
        $foto = $_SESSION['nomeFoto'];
        $estado = 1;

        $sql = "insert into tblsobreconteudo ( texto, titulo, imagem, estado )
                value ('".$conteudo."', '".$titulo."', '".$foto."',' ".$estado."')";

        echo($sql); exit;

        if(mysqli_query($conex, $sql)){
            echo("<script> 
                    alert('registro inserido com sucesso'); 
                    location.href = '../sobre.php';
                </script>");
        }
        else {
            echo("<script>
                    alert(' Erro ao inserir Conteudo ')
                    location.href = '../sobre.php';
                </script>");
        }
    }

?>