<?php 
    $titulo = null;
    $texto = null;

    include_once('BD/conecta.php');

    $conex = conexaoMysql();

    $action = "BD/insertSobre.php";
    
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editarAtualizar');
        $id = $_GET['id'];

        $sql = "select * from tblsobreconteudo where idConteudo = ".$id;

        $selectList = mysqli_query($conex, $sql);
        
        if($rsLista = mysqli_fetch_assoc($selectList)){
            
            $texto = $rsLista['texto'];
            $titulo = $rsLista['titulo'];
            
            $action = "BD/updateSobre.php?modo=atualizar&id=".$rsLista['idConteudo'];
            #echo($action);
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
                    // alert('chegou na foto'); exit;
                    $('#frmImagem').ajaxForm({
                        target: '#imagem'
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
                <div class="conteudoSobre">
                    <form action="<?=$action?>" method="post" name="frmSobre">
                        <table class="sobreSesao1">
                            <tr>
                                <td colspan="2" class="titleSobre"> Cadastro De Conteúdo </td>
                            </tr>
                           <tr>
                                <td class="inputTextTitulo">
                                    <p> Titulo </p>
                                    <input type="text" name="txtTitulo" value="<?=$titulo?>">
                                </td>
                                <td class="textAreaConteudo">
                                    <p> Conteudo </p>
                                    <textarea name="txtConteudo" rows="7" cols="30" maxlength="250"><?=$texto?></textarea>
                                </td>
                           </tr>
                        </table>
                        <div class="buttonEnviar btnEnviar">
                            <input type="submit" value="Enviar" name="btnEnviar" class="buttonEnviar"> 
                        </div>
                    </form>

                </div> 
               <div class="sobreSesao2">
                   <!-- SEGUNDO FOR DA TELA  -->
                    <form action="BD/uploadSobre.php" method="post" name="frmImagem" id="frmImagem">
                        <table>
                            <tr>
                                <td class="inputTypeImagem">
                                    <input type="file" name="fleImagem" value="" id="foto">
                                </td>
                                <td >
                                    <div id="imagem" class="sobreImg">
                                        <img src="">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form> 
               </div>
                <div class="sobreTbl">
                    <table>
                        <tr>
                            <td colspan="6" class="titleSobre"> 
                                Visualizar Registros Cadastrados 
                            </td>
                        </tr>
                        <tr>
                            <td> Titulo </td>
                            <td> Conteudo </td>
                            <td> Imagem </td>
                            <td> Ativado/Desativado </td>
                            <td> Editar </td>
                            <td> Excluir </td>
                        </tr>
                        <?php 
                            $sql = "select * from tblsobreconteudo";
                            $selectConteudo = mysqli_query($conex, $sql);
                            while($rsSobre = mysqli_fetch_assoc($selectConteudo)){
 
                        ?>
                        <tr>
                            <td> <?=$rsSobre['titulo']?> </td>
                            <td> <?=$rsSobre['texto']?> </td>
                            <td class="imgBanco"> 
                                <img src="BD/arquivo/<?=$rsSobre['imagem']?>">
                            </td>
                            <td class="imgEstado">  
                                <a href="BD/desativarConteudoSobre.php?modo=desativar&id=<?=$rsSobre['idConteudo']?>&estado=<?=$rsSobre['estado']?>">
                                    <?php 
                                        if($rsSobre['estado'] == 1){
                                            $img = "img/activate.jpg";
                                        }
                                        else if ($rsSobre['estado'] == 0){
                                            $img = "img/deactivate.jpg";
                                        }
                                    ?>
                                    <img src="<?=$img?>" alt="status" title="estado">
                                </a>
                            </td>
                            <td class="editar">  
                                <a href="sobre.php?modo=editarAtualizar&id=<?=$rsSobre['idConteudo']?>">
                                    <img src="img/edit.jpg">
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Deseja mesmo Excluir o dado ?')" href="BD/deleteSobre.php?modo=excluir&id=<?=$rsSobre['idConteudo']?>">
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