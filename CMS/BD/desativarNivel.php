<?php
    if(isset($_GET['modo'])){

        if($_GET['modo'] == 'desativar'){

            include_once('conecta.php');
            $conex = conexaoMysql();

            if(isset($_GET['id'])){

                $id = $_GET['id'];
                $estado = $_GET['estado'];

                if($estado == 1){
                    $estado = 0;
                    $sql = "update tblNivel set estado = ".$estado." where idNivel = ".$id;

                    if(mysqli_query($conex, $sql)){
                        echo("<script> 
                                 alert('Nivel Desativado');
                                 location.href = '../admNiveis.php';
                        </script>");
                    }
                    else{
                        echo("<script> 
                             alert('Erro ao Desativar Nivel');
                             location:'../admNiveis.php';
                        </script>");
                    }
                }
                else if($estado == 0){
                    $estado = 1;
                    $sql = "update tblNivel set estado = ".$estado." where idNivel = ".$id;

                    if(mysqli_query($conex, $sql)){
                        echo("<script> 
                                 alert('Nivel Ativado');
                                 location.href = '../admNiveis.php';
                        </script>");
                    }
                    else{
                        echo("<script> 
                             alert('Erro ao Ativar Nivel');
                             location:'../admNiveis.php';
                        </script>");
                    }
                }

            }
        }
    }
?>