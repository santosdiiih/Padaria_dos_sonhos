<?php
    include_once('BD/conecta.php');

    $conex = conexaoMysql();

    $nome = null;
    $login = null;
    $senha = null;
    $profissao = null;
    $nivelAcesso = null;
    $idNivel = null;
    $status = null;

    if (isset($_POST['btnEnviar'])){
        $nome = $_POST['txtNome'];
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        $status = 1;

        
        # criptograma a senha que vai para o banco
        $senha = md5($senha);

        
        # $nivelAcesso = $rsTipo['tipo'];
        $idNivel = $_POST['sltNivel'];

        # echo($sql); exit;
    };
    if(!($nome || $login || $senha ) == "" ){
        
        $sql = " insert into tblUsuario (nome, login, senha, idNivel, estado ) 
        values ('".$nome."', '".$login."', '".$senha."', ".$idNivel.",".$status." )";

        # echo($sql); exit;

        if(mysqli_query($conex, $sql)){
            echo("<script> alert('Registro inserido com Sucesso') </script>");
        }
        else{
            echo("<script> alert('erro ao inserir dados') </script>");
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
                <form action="cadastrarUsuario.php" method="post" name="frmUsuario" >
                    <div class="grupo"> 
                        <div class="valueInput"> Nome: </div>
                        <div  class="input">  
                            <input type="text" name="txtNome"> 
                        </div>
                    </div>
                    <div class="grupo"> 
                        <div class="valueInput"> Login: </div>
                        <div  class="input">  
                            <input type="text" name="txtLogin"> 
                        </div>
                    </div>
                    <div class="grupo"> 
                        <div class="valueInput"> Senha: </div>
                        <div  class="input">  
                            <input type="password" name="txtSenha"> 
                        </div>
                    </div>
                    
                    <div class="grupo"> 
                        <div class="valueInput"> Nivel de Acesso: </div>
                        <div  class="input">  
                        <select name="sltNivel">
                                
                                <option value=""> Selecione um Nivel </option>
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

            
            
        </div>
    </body>
</html>