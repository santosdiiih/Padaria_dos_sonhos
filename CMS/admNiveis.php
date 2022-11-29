<?php 
    include_once('BD/conecta.php');

    $conex = conexaoMysql();

        $admUsuario = null;
        $admFaleConosco = null;
        $admConteudo = null;
        $admProduto = "";
        $tipoNivel = null;
        $estado = null;

    $action = "BD/insertNivel.php?modo=inserir";
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'atualizar'){

            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = 'select * from tblNivel where id = '.$id;

                $selectConteudo = mysqli_query($conex, $sql);
                if($rsList = mysqli_fetch_assoc($selectConteudo)){

                    $admUsuario = $rsList['administrarUsuario'];
                    $admFaleConosco = $rsList['administrarFaleConosco'];
                    $admConteudo = $rsList['administrarConteudo'];
                    $admProduto = $rsList['administrarProduto'];
                    $tipoNivel = $rsList['tipo'];
                    $estado = $rsList['estado'];

                    $action = "BD/updateNivel.php?modo=atualizar&id= ".$rsList['idNivel'];

                }
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

            <form action="<?=$action?>" method="post" name="frmNiveis">
                <div class="containerNivel">
                    <select name="sltadmNivel">
                        <p> Nivel de Usuario </p>
                        <option value=""> Selecione um Nivel</option>
                        <option value="Administrador"> Administrador </option>
                        <option value="Operador Conteudo"> Operador de Conteudo </option>
                        <option value="Relacionamento Cliente"> Relacionamento Com Cliente </option>
                    </select>
                </div>

                <div class="tableNivel">
                    <table>
                        <tr>
                            <td class="Nivel"> 
                                 Administrar Conteudo
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoAdminConteudo" value="1" select> Sim.
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoAdminConteudo" value="0" select> Não.
                            </td>
                        </tr>
                        <tr>
                            <td class="Nivel"> 
                                 Administrar Fale Conosco.
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoAdminFaleConosco" value="1" select> Sim.
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoAdminFaleConosco" value="0" select> Não.
                            </td>
                        </tr>
                        <tr>
                            <td class="Nivel"> 
                                 Administrar Usuarios.
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoadminUsuario" value="1" select> Sim.
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoadminUsuario" value="0" select> Não.
                            </td>
                        </tr>
                        <tr>
                            <td class="Nivel"> 
                                 Administrar Produtos.
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoadminProduto" value="1" select> Sim.
                            </td>
                            <td class="radio">
                                <input type="radio" name="rdoadminProduto" value="0" select> Não.
                            </td>
                        </tr>
                    </table>
                    <div class="button">
                        <input type="submit" name="btnEnviar" value="Enviar" class="btnEnviar">
                    </div>
                </form>
                <div class="tblNiveis"> 
                    <table >
                        <tr>
                            <td colspan="8" class="tituloNivel"> Visualizar Niveis Cadastrados </td>
                        </tr>
                        <tr>
                            <td> Nivel de Acesso </td>
                            <td> Conteúdo </td>
                            <td> Administra Fale Conosco </td>
                            <td> Administra Usuario </td>
                            <td> Administra Produtos </td>
                            <td> Editar </td>
                            <td> Ativar/Desativar </td>
                            <td> Excluir </td>
                        </tr>
                        <?php 
                            $sql = "SELECT * FROM dbpadokas.tblnivel";

                            $selectNivel = mysqli_query($conex, $sql);

                            while ($rsNivel = mysqli_fetch_assoc($selectNivel)) {
                                ?>
                        <tr>
                            <td><?=$rsNivel['tipo']?></td>
                            <td><?php if($rsNivel['administrarConteudo'] == 1) echo(" Sim "); else { echo(" Não ");}?></td>
                            <td><?php if($rsNivel['administrarFaleConosco'] == 1) echo(" Sim "); else { echo(" Não ");}?></td>
                            <td><?php if($rsNivel['administrarUsuario'] == 1) echo(" Sim "); else { echo(" Não ");}?></td>
                            <td><?php if($rsNivel['administrarProduto'] == 1) echo(" Sim "); else { echo(" Não ");}?></td>
                            <td>
                                <a href="admNiveis.php?modo=editar&id=<?=$rsNivel['idNivel']?>">
                                    <div class="editarUsuario"></div>
                                </a>
                            </td>
                            <td class="imgEstado">
                                <a onclick="return confirm('Deseja Mesmo Desativar Nivel ?')" href="BD/desativarNivel.php?modo=desativar&id=<?=$rsNivel['idNivel']?>&estado=<?=$rsNivel['estado']?>">
                                    <?php 
                                        if($rsNivel['estado'] == 1){
                                            $img = "img/activate.jpg";
                                        }
                                        else if ($rsNivel['estado'] == 0){
                                            $img = "img/deactivate.jpg";
                                        }
                                    ?>
                                    <img src="<?=$img?>">
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Deseja mesmo Excluir esse Nivel ?')" href="BD/deleteNivel.php?modo=excluir&id=<?=$rsNivel['idNivel']?>">
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
            
        </div>
    </body>
</html>