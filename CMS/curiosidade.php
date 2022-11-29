<?php 
    include_once('BD/conecta.php');

    $conex = conexaoMysql();

        $titulo = "";
        
        $conteudo = "";
        $estado = "";

        $action = "BD/insertCuriosidade.php?modo=inserir";
        
        
    if(isset($_GET['modo'])){
        if ($_GET['modo'] == 'consultaEditar'){

            # echo('entrouAqui'); exit;

            $idConteudo = $_GET['id'];

            $sql = "select * from tblCuriosidade where idConteudo = ".$idConteudo;

            # echo($sql); exit;

            $selectConteudo = mysqli_query($conex, $sql);

            if($rsList = mysqli_fetch_assoc($selectConteudo)){

                # echo($selectConteudo); exit;

                $id = $rsList['idConteudo'];
                $conteudo = $rsList['texto'];
                $titulo = $rsList['titulo'];

                $action = "BD/updateCuriosidade.php?modo=atualizar&id=".$rsList['idConteudo'];
                
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
        
    </head>
    <body>
        <div class="container">
            <?php 
                include_once('header.php');
            ?>
            <div class="conteudo">
               

            <div class="conteudoCuriosidade">
                <form action="<?=$action?>" method="post" name="frmCuriosidade"  enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan="4" class="titleCurisidade"> Adicione Conteudo </td>
                        </tr>
                        <tr>
                            <td class="inputTitle">
                               <p> Titulo </p>
                                <input type="text" name="txtTitulo" class="inputTitle" value="<?=$titulo?>">                                
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <p> Conteudo </p>
                                <textarea name="txtConteudo" cols="30" rows="7" maxlength="210" class="textArea"><?=$conteudo?></textarea>
                            </td> 
                        </tr>
                        <tr>
                        <td>
                            <input type="submit" value="Enviar" name="btnEnviar" class="btnEnviar">
                        </td>
                        </tr>
                        
                        
                    </table>
                </form>
            </div>
            <div class="visualizarConteudoCuriosidade">
                <table>
                    <tr>
                        <td colspan="5" class="titleCuriosidade"> 
                            Visualizar Conteudo 
                        </td>
                    </tr>
                    <tr>
                    <tr>    
                        <td> Titulo </td>
                        <td> Conteudo </td>
                        <td> Ativar/Desativar </td>
                        <td> Editar </td>
                        <td> Excluir </td>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM dbpadokas.tblcuriosidade";
                       

                        $selectConteudo = mysqli_query($conex, $sql);

                        # echo($sql); exit;

                        while ($rsCuriosidade = mysqli_fetch_assoc($selectConteudo)) {
                            ?>
                    <tr>
                        
                        <td><?=$rsCuriosidade['titulo']?></td>
                        <td><?=$rsCuriosidade['texto']?></td>                       
                        <td class="imgEstado">
                            <a onclick="return confirm('Deseja mesmo Desativar esse Conteudo')" href="BD/desativarCuriosidade.php?modo=desativar&id=<?=($rsCuriosidade['idConteudo'])?>&estado=<?=($rsCuriosidade['estado'])?>">
                                <?php 
                                     if($rsCuriosidade['estado'] == '1'){
                                        $img = "img/activate.jpg";
                                    }
                                    else if($rsCuriosidade['estado'] == '0')  {
                                        $img = "img/deactivate.jpg";
                                    }
                                    ?>
                                    <img src="<?=$img?>" alt="status" titulo="estado">
                            </a>

                        </td>
                        <td class="editar">
                            <a href="curiosidade.php?modo=consultaEditar&id=<?=$rsCuriosidade['idConteudo']?>">
                                <img src="img/edit.jpg" >
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Deseja Mesmo Excluir Conteudo?')" href="BD/deleteCuriosidade.php?modo=excluir&id=<?=($rsCuriosidade['idConteudo'])?>">
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
            
       
    </body>
</html>