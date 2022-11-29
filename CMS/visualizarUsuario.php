<?php 
    include_once('BD/conecta.php');
    $conex = conexaoMysql();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> CMS - Padokas </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="scripts/jquery.js"> </script>
        <script>
             $(document).ready(function(){
               $('.editarUsuario').click(function(){
                    $('#modal').fadeIn(1000);
               });
            });
            function visualizarContato(idUsuario){
                $.ajax({
                    type: 'POST',
                    url: 'BD/editarUsuario.php',
                    data: {modo: 'editar', id: idUsuario},
                    success: function (dados) {
                        $('#modalConteudo').html(dados);
                    }
                    
                });
            }
        </script>   
        
    </head>
    <body>
        <div id="modal">
            <div id="modalConteudo"></div>
        </div>
        <div class="container">
            <?php 
                include_once('header.php');
            ?>
            <div class="conteudo">
                <form action="visualizarUsuario.php" name="frmUsuario" method="post">
                    <div class="tblVisualizarUsuarios">
                            <table>
                                <tr> 
                                    <td colspan="8" class="tituloUsuario"> Visualizar Usuarios </td>
                                </tr>
                                <tr>
                                    <td> Nome: </td>
                                    <td> Login: </td>
                                    <td> Senha: </td>                                    
                                    <td> Nivel de Acesso: </td>
                                    <td> Editar </td>
                                    <td> Ativar / Desativar </td>
                                    <td>  
                                        <form action="visualizarUsuario.php" method="post" name="frmAdm">
                                            <select name="sltFiltro">
                                                <p> Filtro </p>
                                                <option value="1"> Ativado  </option>
                                                <option value="0"> Desativado </option>
                                            </select>
                                            <input type="submit" name="btnFiltrar" value="Filtrar">
                                
                                        </form>   
                                    </td>
                                    <td> Excluir </td>
                                </tr>
                                <?php 

                                $sql = "select tblUsuario.idUsuario, tblUsuario.nome, 
                                tblUsuario.login, tblUsuario.senha, tblUsuario.estado, tblNivel.tipo
                                from tblUsuario, tblNivel 
                                where tblNivel.idNivel = tblUsuario.idNivel ";

                                    if(isset ($_POST['btnFiltrar'])){
                                        $filtro = $_POST['sltFiltro'];

                                        $sql = "select tblUsuario.idUsuario, tblUsuario.nome, 
                                        tblUsuario.login, tblUsuario.senha, tblUsuario.estado, tblNivel.tipo
                                        from tblUsuario, tblNivel 
                                        where tblNivel.idNivel = tblUsuario.idNivel 
                                        and tblUsuario.estado = " .$filtro;

                                    }
                                       
                                        $selectUsuario = mysqli_query($conex, $sql);

                                        while ($rsUsuario = mysqli_fetch_assoc($selectUsuario)) {
                                            
                                            ?>  
                                <tr>
                                    <td><?=$rsUsuario['nome']?></td>
                                    <td><?=$rsUsuario['login']?></td>
                                    <td><?=$rsUsuario['senha']?></td>
                                    <td><?=$rsUsuario['tipo']?></td>            
                                    
                                    <td class="editarUser">
                                        <!-- href="visualizarUsuario.php?modo=editar&id=<?=$rsUsuario['idUsuario']?>" -->
                                            <a >
                                                <div class="editarUsuario" onclick="visualizarContato(<?=$rsUsuario['idUsuario']?>)">
                                                </div>
                                            </a> 
                                           
                                    </td>
                                    <td class="desativarUser"> 
                                        <a onclick="return confirm('Deseja mesmo Desativar esse Usuario?')" href="BD/desativarUsuario.php?modo=desativar&id=<?=($rsUsuario['idUsuario'])?>&estado=<?=($rsUsuario['estado'])?>" >
                                            <?php if($rsUsuario['estado'] == '1'){
                                                $img = "img/activate.jpg";
                                            }
                                            else {
                                                $img = "img/deactivate.jpg";
                                            }
                                            ?>
                                            <img src="<?=$img?>" alt="status" titulo="estado">
                                        </a>
                                    </td>
                                    <td>
                                        <?php 
                                            if($rsUsuario['estado'] == 1){
                                                echo("Ativado");
                                            } 
                                            else {
                                                
                                                echo("Desativado");
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Deseja Mesmo Excluir esse Usuario?')" href="BD/excluirUsuario.php?modo=excluir&id=<?=($rsUsuario['idUsuario'])?>">
                                            <div class="excluir"></div>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>

                            </table>
                        </div>
                        
                    </form>
               
            </div>
   
        </div>
    </body>
</html>