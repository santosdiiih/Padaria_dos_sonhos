<?php 
    function conexaoMysql (){
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $dataBase = 'dbPadokas';
    
        $conexao = mysqli_connect($server, $user, $password, $dataBase);
    
        
        # verifica se a conexao foi estabelecida
        # var_dump($conexao);
    
        return $conexao;
    }
?>
