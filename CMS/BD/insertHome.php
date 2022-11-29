<?php
    include_once('conecta.php');
    $conex = conexaoMysql();

    if(isset($_POST['btnEnviar'])){
        session_start();

        $nome = $_POST['txtNome'];;
        $preco = $_POST['txtPreco'];
        $descicao = $_POST['txtDescricao'];
        $foto = $_SESSION['nomeFoto'];
        $estado = 1;

        $sql = "insert into tblproduto ( nome, descricao, preco, imagem, estado )
                value ('".$nome."', '".$descicao."','".$preco."' ,'".$foto."',' ".$estado."')";

        #echo($sql); return;
        if(mysqli_query($conex, $sql)){
            echo("<script> 
                    alert('registro inserido com sucesso'); 
                    location.href = '../sobre.php';
                </script>");
        }
        else {
            echo("<script>
                    alert(' Erro ao inserir Conteudo ')
                    location.href = '../sobre.php';
                </script>");
        }
    }
?>