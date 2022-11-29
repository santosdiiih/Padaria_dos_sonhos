<?php 
    if (isset($_GET['modo'])) {
        if ($_GET['modo'] == 'atualizar') {

            include_once('conecta.php');

            $conex = conexaoMysql();
            session_start();
            $id = $_GET['id'];

            $titulo = $_POST['txtTitulo'];
            $texto = $_POST['txtConteudo'];
            $foto = $_SESSION['nomeFoto'];

            $sql = "update tblsobreconteudo set
            texto = '".$texto."',
            titulo = '".$titulo."',
            imagem = '".$foto."'
            where idConteudo = ".$id;

            #echo($sql); exit;
            if (mysqli_query($conex, $sql)) {
                echo("
                <script> 
                    alert('registro inserido com sucesso'); 
                    location.href = '../sobre.php';
                </script>");
            } else {
                echo("<script> 
                alert('erro ao salvar '); 
                location.href = '../sobre.php';
                window.history.back();
                </script>");
            }
        
    
        }
    }
?>