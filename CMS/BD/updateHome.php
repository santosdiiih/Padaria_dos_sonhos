<?php 
    if (isset($_GET['modo'])) {
        if ($_GET['modo'] == 'atualizar') {

            include_once('conecta.php');

            $conex = conexaoMysql();
            session_start();
            $id = $_GET['id'];

            $nome = $_POST['txtNome'];
            $descricao = $_POST['txtDescricao'];
            $foto = $_SESSION['nomeFoto'];
            $preco = $_SESSION['txtPreco'];

            $sql = "update tblProduto set
            nome = '".$descricao."',
            descricao = '".$nome."',
            preco = '".$preco."',
            imagem = '".$foto."'
            where idProduto = ".$id;

            #echo($sql); exit;
            if (mysqli_query($conex, $sql)) {
                echo("
                <script> 
                    alert('registro inserido com sucesso'); 
                    location.href = '../home.php';
                </script>");
            } else {
                echo("<script> 
                alert('erro ao salvar '); 
                location.href = '../home.php';
                window.history.back();
                </script>");
            }
        }
    }
?>