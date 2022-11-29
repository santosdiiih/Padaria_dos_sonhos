<?php 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'inserir'){

            include_once('conecta.php');
            $conex = conexaoMysql();

            if(isset($_POST['btnEnviar'])){

                $admUsuario = $_POST['rdoadminUsuario'];
                $admFaleConosco = $_POST['rdoAdminFaleConosco'];
                $admConteudo = $_POST['rdoAdminConteudo'];
                $admProduto = $_POST['rdoadminProduto'];
                $tipoNivel = $_POST['sltadmNivel'];
                $estado = 1;
            
            if(!($admConteudo || $admFaleConosco || $admUsuario || $admProduto) == ""){
                $sql = "insert into tblNivel (administrarUsuario, administrarConteudo, 
                administrarFaleConosco, administrarProduto, tipo, estado) 
                values ('".$admUsuario."', '".$admConteudo."', '".$admFaleConosco."', '".$admProduto."', '".$tipoNivel."', '".$estado."')";
        
                # echo($sql); exit;
        
                if(mysqli_query($conex, $sql)){
                    echo("<script> alert('Dados Inserido com Sucesso')</script>");
                    header('location: ../admNiveis.php');
                }
                else{
                    echo("<script> alert('Erro ao Inserir os dados')</script>");
                }
            }
            else{
                echo("<script> alert('Preencha os Dados')</script>");
                header('location: admNiveis.php');
            }
        };
        }
    }

?>