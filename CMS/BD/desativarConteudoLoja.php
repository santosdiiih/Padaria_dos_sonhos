<?php 

#echo('bd');exit;   
if(isset($_GET['modo'])){ 
        if($_GET['modo'] == 'desativar'){
           # echo('modo'); exit;

            include_once('conecta.php');
            $conex = conexaoMysql();

            if(isset($_GET['id'])){

                $idLoja = $_GET['id'];
                $estado = $_GET['estado'];

                if($estado == 1){
                    $estado = 0;
                    $sql = "update tblloja set estado = ".$estado." where idloja = ".$idLoja;

                    #echo($sql); exit;
                    if(mysqli_query($conex, $sql)){
                        echo("<script> 
                                    alert('Conteudo Desativado');
                                    location.href = '../loja.php';
                            </script>");
                    }

                }


                else if($estado == 0){
                    $estado = 1;
                    $sql = "update tblloja set estado = ".$estado." where idloja = ".$idLoja;

                    if(mysqli_query($conex, $sql)){
                        echo("<script> 
                                    alert('Conteudo Ativado');
                                    location.href = '../loja.php';
                            </script>");

                    }
                }
            }

        }

    }

?>