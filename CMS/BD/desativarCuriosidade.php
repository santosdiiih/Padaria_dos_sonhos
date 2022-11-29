<?php 

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){

            include_once('conecta.php');

            $conex = conexaoMysql();

            if (isset($_GET['id'])){

                $idCuriosidade = $_GET['id'];

                $status = $_GET['estado'];

                if($status == 1){
                    $status = 0;
                    
                    $sql = "update tblcuriosidade set estado = ".$status." where idconteudo =".$idCuriosidade;
                    
                    if(mysqli_query($conex, $sql)){
                        echo("<script> 
                                 alert('Conteudo Desativado');
                                 location.href = '../curiosidade.php';
                        </script>");
                    }
                    else{
                        echo("<script> 
                             alert('Erro ao Desativar');
                             location:'../curiosidade.php';
                        </script>");
                    }
                    
                    

                     # echo($sql); exit;
                }
                else {
                    if($status == 0){
                        $status = 1;
                        $sql = "update tblcuriosidade set estado = ".$status." where idconteudo =".$idCuriosidade;
    
                        # echo($sql); exit;
    
                        if(mysqli_query($conex, $sql)){
                            echo("<script> 
                                     alert('Conteudo Ativado');
                                     location.href = '../curiosidade.php';
                            </script>");
                        }
                        else{
                            echo("<script> 
                                 alert('Erro ao Desativar');
                                 location:'../curiosidade.php';
                            </script>");
                        }
                     }
                }
                
               
            }
        }
    }
?>