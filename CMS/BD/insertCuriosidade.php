<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'inserir'){
            if(isset($_POST['btnEnviar'])){

                include_once('conecta.php');
        
                $conex = conexaoMysql();
        
                $titulo = $_POST['txtTitulo'];
                $conteudo = $_POST['txtConteudo'];
                $estadoConteudo = 1;
                
        
                # script que envia os dados ao banco
                $sql = "insert into tblcuriosidade (titulo, texto, estado) 
                values ('".$titulo."', '".$conteudo."', ".$estadoConteudo.")";
        
                # executndo o insert no banco
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
        
        
                # echo($sql); exit;
        
                
            }
        }
    }

?>