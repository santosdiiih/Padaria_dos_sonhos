<?php 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'excluir'){
            include_once('conecta.php');
            $conex = conexaoMysql();

            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "delete from tblsobreconteudo where idConteudo = ".$id;
                if(mysqli_query($conex, $sql)){
                    header("location: ../sobre.php");
                }
            }
        }
    }
?>