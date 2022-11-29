<?php
    include_once('BD/conecta.php');
    $conex = conexaoMysql();
    $filtro = '';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> CMS - Padokas </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="scripts/jquery.js"></script>
        <script>
             $(document).ready(function(){
               $('.visualizar').click(function(){
                    $('#modal').fadeIn(1000);
               });
            });
            function visualizarContato(idContato){
                $.ajax({
                    type: 'POST',
                    url: 'BD/visualizarContato.php',
                    data: {modo: 'visualizar', id: idContato},
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
                
                <table id="tblFaleConosco">
                    <tr class="tblLinhaTituloFaleConosco">
                        <td id="tituloFaleConosco" colspan="9"> Consulta de Dados </td> 
                    </tr>
                    <tr class="tblLinhasFaleConosco">
                        <td class="tblColunasfaleConosco"> Nome </td>
                        <td class="tblColunasfaleConosco"> Telefone </td>
                        <td class="tblColunasfaleConosco"> Celular </td>
                        <td class="tblColunasfaleConosco"> email </td>
                        <td class="tblColunasfaleConosco"> Sexo </td>
                        <td class="tblColunasfaleConosco"> Profissão </td>
                        <td class="tblColunasfaleConosco"> 
                            <form action="admFaleConosco.php" method="post" name="frmAdm">
                                <select name="sltFiltro">
                                    <p> Filtro </p>
                                    <option value="Sugestao"> Sugestão  </option>
                                    <option value="Critica"> Critica </option>
                                </select>
                                <input type="submit" name="btnFiltrar" value="Filtrar">
                                
                            </form>   
                        </td>
                        <td class="tblColunasfaleConosco"> Excluir </td>
                        <td class="tblColunasfaleConosco"> visualizar </td>
                    </tr>

                    <?php 
                       $sql = "SELECT tblcontato.idContato, tblcontato.nome,
                        tblContato.telefone, tblContato.celular,
                        tblContato.email, tblContato.sexo, tblContato.profissao, tblContato.filtro 
                        from dbpadokas.tblcontato ";

                        if(isset($_POST['btnFiltrar'])){
                            $filtro = $_POST['sltFiltro'];

                            $sql = "SELECT tblcontato.idContato, tblcontato.nome,
                            tblContato.telefone, tblContato.celular,
                            tblContato.email, tblContato.sexo, tblContato.profissao, tblContato.filtro 
                            from dbpadokas.tblcontato where tblContato.filtro = '" . $filtro . "'";
                        }
                        $selectContato = mysqli_query($conex, $sql);
                        while($rsContato = mysqli_fetch_assoc($selectContato)){
                    
                    ?>

                    <tr class="tblLinhasFaleConosco">
                        <td class="tblColunasfaleConosco"><?=$rsContato['nome']?></td>
                        <td class="tblColunasfaleConosco"><?=$rsContato['telefone']?></td>
                        <td class="tblColunasfaleConosco"><?=$rsContato['celular']?></td>
                        <td class="tblColunasfaleConosco"><?=$rsContato['email']?></td>
                        <td class="tblColunasfaleConosco"><?=$rsContato['sexo']?></td>
                        <td class="tblColunasfaleConosco"><?=$rsContato['profissao']?></td>
                        <td class="tblColunasfaleConosco"><?=$rsContato['filtro']?></td>
                        <td class="tblColunasfaleConosco"> 
                            <div class="imagens">
                                <a onclick="return confirm('Deseja realmente excluir esse Registro?')" href="BD/deleteFaleConosco.php?modo=excluir&id=<?=$rsContato['idContato']?>">
                                    <div class="excluir"></div>
                                </a>                                
                            </div>
                        </td>
                        <td class="tblColunasfaleConosco"> 
                            <div class="imagens">
                                <a>
                                    <div class="visualizar" onclick="visualizarContato(<?=$rsContato['idContato']?>)"></div>
                                </a>                                
                            </div>
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
