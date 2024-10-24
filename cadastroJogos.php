<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Venom.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Style.css">
    <title>Tela do Gerente</title>
</head>

<style>

body{
    background-color: #1b2838;
}

/* .Middle1{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-left: 3px solid red;
    height: 45em;
}
.Middle2{
    border-bottom: 3px solid blue;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80em;
}
.MiddleCircle{
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 4px solid green;
    border-radius: 64px;
    position: absolute;
    height: 14px;
    width: 14px;
} */

table{
    position: relative;
    top: 120px; 
    left: 200px; 
    height: 104px;
    width: 280px;
    font-size: 19px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: black;
}

td{
    color: #66c0f4;
}

td button{
    height: 30px;
    width: 80px;
    color: white;
    text-shadow: 1px 1px 1px black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

td button:hover{
    cursor: pointer;
}

th{
    text-align: center;
    font-size: 18px;
    color: white;
    user-select: none;
}


tr, td, th {
    border-bottom:  3.5px solid black;
    padding: 10px;
}

button p{
    position: relative;
    top: -15px;
    left: 24px;
}

.Dell{
    text-decoration: none;
    color: white;
    text-shadow: 1px 1px 1px black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    border: solid 1px black;
    background-color: crimson; 
    position: relative;
    left: 2px;
    top: 16px;

}

.Dell a{
    text-decoration: none;
    color: white;
    text-shadow: 1px 1px 1px black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}


.See{
    background-color: #969eab;
    border: solid 1px black;
    position: relative;
    left: -100px;
    top: -21px;
}

.BtnV{
    position: absolute;
    z-index: 6;
    top: 13%;
    left: -4.5%;
    transform: translate(-50%, 200%);
    border: none;
    width: 13em;
    height: 2em;
    background-color: #6c9018;
    font-size: 26px;
    transform: scaleX(-1);
    transform: skew(-25deg);
    transition: all 0.3s ease;
    color: white;
    text-shadow: 1px 1px 1px black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    user-select: none;
}

.BtnV p{
    position: absolute;
    top: -18px;
    left: 90px;
}

.BtnV:hover{
    left: -3%;
    cursor: pointer
}

.Iimagens{
    position: relative;
    height: 75px;
    width: 75px;
    left: 21px;
    border: solid 1px white;
}

.Ddesc{
    text-wrap: wrap;
    clear: left;
    position: relative;
    font-size: 18px;
}

</style>

<body>

<?php

session_start();

if (empty($_SESSION['User'])){
    // Logado??? Não?? Tchau, bb.
    header("Location: index.php", true,301);
    exit();
} else {
    $Nome = $_SESSION['User'];
}

echo "<header><p class='bi bi-person-circle'> ".$Nome."</p></header>"

// header('Content-Type: text/html; charset=utf-8');
/* include("conexao.php")*/
?>

<a href="sair.php" class="Exit"><button>Sair</button></a>

<a href="jogosNew.php"><button class="BtnV"><p>Cadastrar Jogo</p></button></a>

<span class="Middle1"></span><span class="Middle2"></span><span class="MiddleCircle"></span>

<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "votacaodosgames";

$conexao = new mysqli($hostname,$user,$password,$database);

if ($conexao -> connect_errno) {
    echo "Falha ao comunicar com banco de dados.". $conexao -> connect_error;
    exit();
}else{

    $sql = "SELECT `id`,`nomeJogos`,`descricao`,`image1`,`image2` FROM `jogos`  WHERE `NomeCriador` = '".$_SESSION['User']."';";
    $dado = $conexao->query($sql);

    echo "";
    echo "<table>";
    echo "<tr>";
        echo "<th>Nome:&emsp;&emsp;&emsp;&emsp;</th>";
        echo "<th>Descrição:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>";
        echo "<th>Imagens:&emsp;&emsp;</th>";
        echo "<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>";
        echo "<th></th>";

    echo "</tr>";

while($row = mysqli_fetch_array($dado)){

     echo "<tr>";
         echo "<td>&ensp;<strong>$row[1]</strong></td>";
         echo "<td class='Ddesc'>&ensp;$row[2]</td>";
         echo "<td><img class='Iimagens' src='$row[3]' alt='Foto de exibição' /></td>";
         echo "<td><img class='Iimagens' src='$row[4]' alt='Foto de exibição' /></td>";


    echo '<td>
            <form action="Excluir.php" method="POST">
                <input type="hidden" id="Dell" name="Dell" value='.$row[0].'>
                <button class="Dell" type="submit">Excluir</button>
            </form>
        </td>
    
        <td style="border-bottom: none;">
            <form action="Visualizar.php" method="POST">
                <input type="hidden" id="View" name="View" value='.$row[1].'>
                <button class="See" type="submit">Visualizar</button>
            </form>
         </td>';
         echo "</tr>";

    echo "";
}
echo "</table>";

$conexao -> close();
    
}


?>

</body>
</html>
