<?php 

session_start();
$hostname = "127.0.0.1";
$user = "root";
$senha = "root";
$bd = "votacaodosgames";

$conexao = new mysqli($hostname,$user,$senha,$bd);

if ($conexao -> connect_errno) {
    echo "erro" . $conexao -> connect_error;
    header("location: cadastroJogos.php",true,301);
    exit();
    }
else{
    echo $_POST['Dell'];
    $sql = "DELETE FROM `jogos` WHERE `id`='".$_POST['Dell']."';";
    $resultado = $conexao->query($sql);
    $conexao->close();
    header("location: cadastroJogos.php",true,301);
    }