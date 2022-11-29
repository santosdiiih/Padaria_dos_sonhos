<?php 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'excluir'){

            include_once('conecta.php');
            $conex = conexaoMysql();

            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "delete from tblloja where idLoja = ".$id;
                # echo($sql);
                if(mysqli_query($conex, $sql)){
                    header('location: ../loja.php');
                }
            }
        }
    }
?>