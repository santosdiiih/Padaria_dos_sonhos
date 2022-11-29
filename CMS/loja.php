<?php 
    include_once('BD/conecta.php');

    $conex = conexaoMysql();
    $titulo = null;

    $action = 'BD/insertLoja.php';
    
    if(isset($_GET['modo'])){

        if($_GET['modo'] == 'consultaEditar'){

            $idLoja = $_GET['id'];

            $sql = 'select * from tblLoja where idLoja ='.$idLoja;
            # echo($sql); exit;

            $selectList = mysqli_query($conex, $sql);

            if($rsLista = mysqli_fetch_assoc($selectList)){

                $titulo = $rsLista['titulo'];
                
                $action = 'BD/updateLoja.php?modo=atualizar&id='.$rsLista['idLoja'];
               # echo($imagem);exit;
            }
        }
    }

    
        
    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> CMS - Padokas </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="scripts/jquery.js" ></script>
        <script src="scripts/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                $('#foto').live('change', function(){
                    // alert('chegou'); exit;
                    $('#frmImg').ajaxForm({
                        target : '#imagem'
                    }).submit();
                })
            });
        </script>
    </head>
    <body>
        <div class="container">
            <?php 
                include_once('header.php');
            ?>
            <div class="conteudo">
                <div class="conteudoLoja">

                    <div class="conteudoLoja">
                        <table>
                            <form action="<?=$action?>" method="post" name="frmLoja"  enctype="multipart/form-data">
                                
                                    <tr>
                                        <td colspan="4" class="titleCurisidade"> Adicione Conteudo </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="inputTitle">
                                        <p> Titulo </p>
                                            <input type="text" name="txtTitulo" class="inputTitle" value="<?=$titulo?>">                                
                                        </td> 
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="Enviar" name="btnEnviar" class="btnEnviar">
                                        </td>
                                    </tr>
                                    
                                
                            </form>
                            <form action="BD/uploadLoja.php" method="post" name="frmImg" id="frmImg" enctype="multipart/form-data">
                                <tr>
                                    <td>
                                        <p> Imagem </p>
                                        <input type="file" name="fleImagem" value="" id="foto">
                                    </td> 
                                    <td>
                                        <div class="lojaimg" id="imagem">
                                            <img src="">
                                        </div>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                        
                </div>
                <div class="tblLoja">
                    <table>
                        <tr>
                            <td class="titleLoja" colspan="5">
                                Visualizar Conteudo
                            </td>
                        </tr>
                        <tr>
                            <td> Titulo </td>
                            <td> Imagem </td>
                            <td> Estado </td>
                            <td> Editar </td>
                            <td> Excluir </td>
                        </tr>
                        <?php 
                            $sql = "select * from tblloja";
                            #echo($sql); exit;

                            $selectConteudo = mysqli_query($conex, $sql);

                            while ($rsLoja = mysqli_fetch_assoc($selectConteudo)) {
                                ?>
                        <tr> 
                            <td><?=$rsLoja['titulo']?></td>
                            <td class="imgBanco"> 
                                <img src="BD/arquivo/<?=$rsLoja['imagem']?>" alt="Imagem cadastrada" titulo="imgBanco">
                            </td>
                            <td class="imgEstado">
                               <a href="BD/desativarConteudoLoja.php?modo=desativar&id=<?=$rsLoja['idLoja']?>&estado=<?=$rsLoja['estado']?>">
                                <?php 
                                        if($rsLoja['estado'] == '1'){
                                            $img = "img/activate.jpg";
                                        }
                                        else if($rsLoja['estado'] == '0'){
                                            $img = "img/deactivate.jpg";
                                        }
                                    ?>
                                    <img src="<?=$img?>" alt="status" titulo="estado" >
                               </a>
                            </td>
                            <td class="editar">
                                <a href="loja.php?modo=consultaEditar&id=<?=$rsLoja['idLoja']?>">
                                    <img src="img/edit.jpg">
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Deseja mesmo Excluir Usuario ?')" href="BD/deletarLoja.php?modo=excluir&id=<?=$rsLoja['idLoja']?>"> 
                                    <div class="excluir"></div>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>

            </div>
                
        </div>     
    </body>
</html>