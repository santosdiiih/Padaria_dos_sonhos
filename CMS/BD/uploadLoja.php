<?php 
 #echo('arquivo load'); exit;
    if($_FILES['fleImagem'] > 0 && $_FILES['fleImagem']['type'] != ''){

        $diretorioArquivo = 'arquivo/';

        $arquivoSize = round($_FILES['fleImagem']['size']/1024);

        $arquivosPermitido = array("image/jpeg", "image/png", "image/jpg", "image/gif");

        $arquivoType = $_FILES['fleImagem']['type'];

        $arquivo = $_FILES['fleImagem']; 

        if(in_array($arquivoType, $arquivosPermitido)){

            if($arquivoSize <= 2000){

                $nomeArquivo = pathinfo ($_FILES['fleImagem']['name'], PATHINFO_FILENAME);

                $extensaoArquivo = pathinfo ($_FILES['fleImagem']['name'], PATHINFO_EXTENSION);

                $nomeArquivoCrypt = md5($nomeArquivo) . uniqid(time());

                $foto = $nomeArquivoCrypt.".".$extensaoArquivo;

                $arquivoTempo = $_FILES['fleImagem']['tmp_name'];

                if(move_uploaded_file($arquivoTempo, $diretorioArquivo.$foto)){
                    session_start();

                    $_SESSION['nomeFoto'] = $foto;

                    echo("<img src='BD/arquivo/".$foto."'>");
                }

            }
        }

    }
?>