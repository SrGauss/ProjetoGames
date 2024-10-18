<?php
session_start();

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "votacaodosgames";

$conexao = new mysqli($hostname,$user,$password,$database);

if ($conexao -> connect_errno) {
    echo "Falha ao comunicar com banco de dados.". $conexao -> connect_error;
    exit();
}else{

    $usuario = $conexao -> real_escape_string($_POST['user']);
    $senha = $conexao -> real_escape_string($_POST['Password']);

    $hash = hash('sha256', $senha);

    $sql = "SELECT `id`,`usuario`,`senha`,`cargo` FROM `logins` WHERE `usuario`='".$usuario."' AND  `senha`='".$hash."';";
    $dado = $conexao->query($sql);
    
    if ($dado->num_rows != 0) {
        $row = $dado -> fetch_array();
        $_SESSION['id'] = $row[0];
        $_SESSION['User'] = $row[1];
        $_SESSION['Cargo'] = $row[3];
        // echo "deu bao";
        $conexao -> close();

            
            if ($row[3] == "user") {
                header("location: algo.php",true,301);
            } else if ($row[3] == "admin") {
                header("location: cadastroJogos.php",true,301);
            }
        
        } else{
        $conexao ->close();
        header("location: index.php", true,301);
        exit();
    }
}

