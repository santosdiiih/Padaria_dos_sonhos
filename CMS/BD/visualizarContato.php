<?php 
    if(isset($_POST['modo'])){
        if($_POST['modo'] == "visualizar"){

        
            if(isset($_POST['id'])){
                include_once('conecta.php');

                $conex = conexaoMysql();

                $id = $_POST['id'];
                
                $sql = "SELECT * FROM dbpadokas.tblcontato where idContato =".$id;

                $selectContato = mysqli_query($conex, $sql);

                if($rsContato = mysqli_fetch_assoc($selectContato)){
                    $nome = $rsContato['nome'];
                    $telefone = $rsContato['telefone'];
                    $celular = $rsContato['celular'];
                    $email = $rsContato['email'];
                    $cep = $rsContato['cep'];
                    $endereco = $rsContato['endereco'];
                    $cidade = $rsContato['cidade'];
                    $bairro = $rsContato['bairro'];
                    $homePage = $rsContato['homePage'];
                    $linkFace = $rsContato['linkfacebook'];
                    $filtro = $rsContato['filtro'];
                    $mensagem = $rsContato['mensagem'];
                    $genero = $rsContato['sexo'];
                    $profissao = $rsContato['profissao'];
                }
            }
        }
    }
?>
<html>
    <head>
        <title> Visualizar </title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="../scripts/jquery.js" ></script>
        <script> 
            $(document).ready(function(){
                $('#fechar').click(function(){
                    $('#modal').fadeOut(1000);
                });
            });
        </script>
    </head>
    <body>
        <div id="visualizar">
            <a href="admFaleConosco.php" id="fechar">
                fechar 
            </a>
            <table>
                <tr id="tituloVisualizar">
                    <td colspan="2">Contatos </td>
                    
                </tr>
                <tr>
                    <td>Nome: </td>
                    <td><?=$nome?></td>
                </tr>
                <tr>
                    <td>Telefone: </td>
                    <td><?=$telefone?></td>
                </tr>
                <tr>
                    <td>Celular: </td>
                    <td><?=$celular?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <td>Cep: </td>
                    <td><?=$cep?></td>
                </tr>
                <tr>
                    <td>Endereço: </td>
                    <td><?=$endereco?></td>
                </tr>
                <tr>
                    <td>Cidade: </td>
                    <td><?=$cidade?></td>
                </tr>
                <tr>
                    <td>Bairro: </td>
                    <td><?=$bairro?></td>
                </tr>
                <tr>
                    <td>HomePage: </td>
                    <td><?=$homePage?></td>
                </tr>
                <tr>
                    <td>Link Facebook: </td>
                    <td><?=$linkFace?></td>
                </tr>
                <tr>
                    <td>Filtro: </td>
                    <td><?=$filtro?></td>
                </tr>
                <tr>
                    <td>Mensagem: </td>
                    <td><?=$mensagem?></td>
                </tr>
                <tr>
                    <td>Sexo: </td>
                    <td><?=$genero?></td>
                </tr>
                <tr>
                    <td>Profissão: </td>
                    <td><?=$profissao?></td>
                </tr>
            </table>
        </div>
    </body>
</html>