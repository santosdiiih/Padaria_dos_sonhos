<?php 
# echo('aqui'); exit;
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'atualizar'){
            require_once('conecta.php');
            $conex = conexaoMysql();

            # echo('entrou modo'); exit;

            if(isset($_POST['btnEnviar'])){
               # echo('entro btn'); exit;

                $id = $_GET['id'];

                $titulo = $_POST['txtTitulo'];
                $conteudo = $_POST['txtConteudo'];
                $estadoConteudo = 1;

                $sql = "update tblCuriosidade set 
                        texto = '".$conteudo."',
                        titulo = '".$titulo."',
                        estado = '".$estadoConteudo."'
                        where idConteudo = ".$id;

                    # echo($sql); exit;
                
                if(mysqli_query($conex, $sql)){
                    echo("
                    <script> 
                        alert('registro inserido com sucesso'); 
                        location.href = '../curiosidade.php';
                    </script>");
                } else {
                    echo("<script> 
                    alert('erro ao salvar '); 
                    location.href = '../curiosidade.php';
                    window.history.back();
                    </script>");
                    }
            }
        }
    }
?>