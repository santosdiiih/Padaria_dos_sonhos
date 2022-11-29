<?php 
    
    

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'atualizar'){

            include_once('conecta.php');

            $conex = conexaoMysql();
        
            $id = $_GET['id'];
            $titulo = $_POST['txtTitulo'];

            session_start();
            $foto = $_SESSION['nomeFoto'];

            $sql = "update tblLoja set 
            titulo = '".$titulo."',
            imagem = '".$foto."'
            where idLoja =".$id;
            
            # echo($sql); exit;
            if(mysqli_query($conex, $sql)){
                echo("
                <script> 
                    alert('registro inserido com sucesso'); 
                    location.href = '../loja.php';
                </script>");
            } else {
                echo("<script> 
                alert('erro ao salvar '); 
                location.href = '../loja.php';
                window.history.back();
                </script>");
                }
        }
    }


?>