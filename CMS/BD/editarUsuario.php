<?php 
   include_once('conecta.php');
   $conex = conexaoMysql();

        if(isset($_POST['modo'])){
            if ($_POST['modo'] == 'editar'){ 
                if (isset($_POST['id'])){
                
                    $idUsuario = $_POST['id'];
    
                    $sql = "select tblUsuario.idUsuario, tblUsuario.nome, 
                    tblUsuario.login, tblUsuario.senha, tblUsuario.estado, tblNivel.tipo, tblNivel.idNivel
                    from tblUsuario, tblNivel 
                    where tblNivel.idNivel = tblUsuario.idNivel 
                    and tblUsuario.idUsuario = " .$idUsuario;
    
                    $selectUsuario = mysqli_query($conex, $sql);
    
                    if($rsUsuario = mysqli_fetch_assoc($selectUsuario)){
                        $nome = $rsUsuario['nome'];
                        $login = $rsUsuario['login'];
                        $senha = $rsUsuario['senha'];
                        $nivelAcesso = $rsUsuario['tipo'];
                        $idNivel = $rsUsuario['idNivel'];
                }
            }
        }
    }

    # echo ($idNivel); exit;
    if(isset($_POST['btnEnviar'])){
        $idUsuario = $_POST['txtId'];
        $nome = $_POST['txtNome'];
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        $idNivel = $_POST['sltNivel'];

        # echo("<script> alert('Erro ao Atualizar dados');</script>");  #exit; 
         $sql = "update tblUsuario set 
         nome = '".$nome."',
         login = '".$login."',
         senha = '".$senha."',
         idNivel = '".$idNivel."'         
         where idUsuario = " .$idUsuario;

        #echo($sql);  exit;

         if (mysqli_query($conex, $sql)) {  
             echo("<script> alert('Dados Atulizado com Sucesso');
                    location.href = '../visualizarUsuario.php';
             </script>");
            
         } else {
             echo("<script> alert('Erro ao Atualizar dados');
                    location.href = '../visualizarUsuario.php';
             </script>");
         }
         # location.href = '../visualizarUsuario.php';
         
     }
    
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Editar Usuario </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="scripts/jquery.js"> </script>
    <script>
    $(document).ready(function() {
        $('#fechar').click(function() {
            $('#modal').fadeOut(1000);
        });
    });
    </script>
</head>

<body>
    <div id="modalUsuario">
        <a href="#" id="fechar">
            fechar
        </a>
        <div class="tituloAtualizaDados"> Atualizar Dados do Usuario </div>
        <form action="BD/editarUsuario.php" method="POST" name="frmUsuario" class="frmUsuario">
            <div class="grupo">
                <div class="valueInput"> Nome: </div>
                <div class="input">
                    <input type="hidden" name="txtId" value="<?=$idUsuario?>">
                    <input type="text" name="txtNome" value="<?=$nome?>">
                </div>
            </div>
            <div class="grupo">
                <div class="valueInput"> Login: </div>
                <div class="input">
                    <input type="text" name="txtLogin" value="<?=$login?>">
                </div>
            </div>
            <div class="grupo">
                <div class="valueInput"> Senha: </div>
                <div class="input">
                    <input type="password" name="txtSenha" value="<?=$senha?>">
                </div>
            </div>

            <div class="grupo">
                <div class="valueInput"> Nivel de Acesso: </div>
                <div class="input">
                    <select name="sltNivel">

                        <option value="<?=$idNivel?>"><?=$nivelAcesso?></option>
                        <?php                                

                                $sql = "select * from tblNivel
                                where idNivel order by tipo";

                                # echo($sql); exit;

                                $selectTipo = mysqli_query($conex, $sql);

                                while ($rsTipo = mysqli_fetch_assoc($selectTipo)) {
                            ?>
                        <option value="<?php echo($rsTipo['idNivel'])?>"><?=$rsTipo['tipo']?></option>
                        <?php
                                }
                            ?>

                    </select>
                </div>
            </div>
            <div class="button">
                <input type="submit" name="btnEnviar" value="Enviar" class="btnEnviar">
            </div>
        </form>
    </div>

</body>

</html>