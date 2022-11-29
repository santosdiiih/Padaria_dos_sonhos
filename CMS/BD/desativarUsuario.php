<?php 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){

            include_once('conecta.php');

            $conex = conexaoMysql();

            

            if (isset($_GET['id'])) {
                $idUsuario = $_GET['id'];
            
                if (isset($_GET['estado'])) {
                    $status = $_GET['estado'];


                
                    if ($status == 1) {
                        $status = 0;

                        $sql = "update tblUsuario set estado = ".$status." where idUsuario =". $idUsuario;

                        # echo($sql); exit;

                        if (mysqli_query($conex, $sql)) {
                            echo('<script> alert("Usuario Desativado");
                               location.href = "../visualizarUsuario.php";
                            </script>');
                        } else {
                            echo('<script> alert("erro ao Desativar Usuario")</script>');
                            #header('location:../visualixarUsuario.php');
                        }
                    }
                    else if($status == 0){
                        $status = 1;

                        $sql = "update tblUsuario set estado = ".$status." where idUsuario =".$idUsuario;

                        if (mysqli_query($conex, $sql)) {
                            echo('<script> alert("Usuario Ativado");
                               location.href = "../visualizarUsuario.php";
                            </script>');
                        } else {
                            echo('<script> alert("erro ao Desativar Usuario")</script>');
                            #header('location:../visualixarUsuario.php');
                        }
                    }
                }
            }
        }
    }

?>