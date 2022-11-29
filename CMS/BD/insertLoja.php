<?php 
     include_once('conecta.php');

     $conex = conexaoMysql();
     #var_dump('conexao'); exit;

    
 
     if(isset($_POST['btnEnviar'])){
         $title = $_POST['txtTitulo'];
         $estado = 1;
 
         session_start();
        $foto = $_SESSION['nomeFoto'];
         
         
         $sql = " insert into tblloja ( titulo, estado, imagem)
                 values ('".$title."', '".$estado."', '".$foto."')";
         # echo($sql);
         if(mysqli_query($conex,$sql)){
            # exit;
             echo("<script> 
                    alert('registro inserido com sucesso'); 
                    location.href = '../loja.php';
                </script>");
         }
         else{
             echo('<script>
                     alert(" Erro ao inserir Conteudo ");
                 </script>');
         } 
     }
?>