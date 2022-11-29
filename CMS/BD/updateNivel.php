<?php 
    if(isset($_GET['modo'])){

        if($_GET['modo'] == 'atualizar'){

            include_once('conecta.php');
            $conex = conexaoMysql();

            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $admUsuario = $_POST['rdoadminUsuario'];
                $admFaleConosco = $_POST['rdoAdminFaleConosco'];
                $admConteudo = $_POST['rdoAdminConteudo'];
                $admProduto = $_POST['rdoadminProduto'];
                $tipoNivel = $_POST['sltadmNivel'];
                
                $sql = " update tblNivel set 
                administrarUsuario = '".$admUsuario."', 
                administrarConteudo = '".$admConteudo."', 
                administrarFaleConosco = '".$admFaleConosco."', 
                administrarProduto = '".$admProduto."', 
                tipo = '".$tipoNivel."'
                where idNivel = ".$id;

                

                if (mysqli_query($conex, $sql)) {
                    echo("
                    <script> 
                        alert('registro inserido com sucesso'); 
                        location.href = '../admNiveis.php';
                    </script>");
                } 
                else {
                    echo("<script> 
                    alert('erro ao salvar '); 
                    location.href = '../admNiveis.php';
                    window.history.back();
                    </script>");
                }
            }
        }
    }

?>