<?php 
    if (isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){

            include_once('conecta.php');
            $conex = conexaoMysql();

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $estado = $_GET['estado'];

                if($estado == 1){
                    $estado = 0;
                    $sql = "update tblProduto set estado = ".$estado." where idProduto = ".$id;
                    
                    if(mysqli_query($conex, $sql)){
                        echo("<script> 
                                    alert('Conteudo Desativado');
                                    location.href = '../home.php';
                            </script>");
                    }
                    else{
                        if(mysqli_query($conex, $sql)){
                            echo("<script> 
                                        alert('Erro ao Desativar Conteudo');
                                        location.href = '../home.php';
                                </script>");
                        }
                    }
                }
                else if($estado == 0 ){
                    $estado = 1;
                    $sql = "update tblProduto set estado = ".$estado." where idProduto = ".$id;

                    if(mysqli_query($conex, $sql)){
                        echo("<script> 
                                    alert('Conteudo Ativado');
                                    location.href = '../home.php';
                            </script>");
                    }
                    else{
                        if(mysqli_query($conex, $sql)){
                            echo("<script> 
                                        alert('Erro ao Ativar Conteudo');
                                        location.href = '../home.php';
                                </script>");
                        }
                    }
                }
            }
        }
    }
?>